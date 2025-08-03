<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use App\Models\PlateScan;
use App\Models\EntranceHistory;
use App\Models\Owner;
use Illuminate\Support\Str;

class LivePlateCapture extends Component
{
    use WithFileUploads;

    public $scanResult;
    public $isScanning = false;
    public $detectionActive = false;
    public $lastCaptureTime = 0;
    public $captureInterval = 2000; // milliseconds between captures
    public $cameraError = null;
    public $showSuccessModal = false;
    public $showRegistrationModal = false;
    public $ownerDetails = [];
    public $plateToRegister = '';

    protected $listeners = [
        'initializeCamera' => 'initializeCamera',
        'processLiveCapture' => 'processImage',
        'scan-error' => 'handleScanError',
        'show-modal' => 'handleShowModal'
    ];

    protected $rules = [
        'ownerDetails.name' => 'required|string|max:255',
        'ownerDetails.email' => 'nullable|email|max:255',
        'ownerDetails.phone' => 'required|string|max:20',
        'ownerDetails.department' => 'nullable|string|max:255',
        'ownerDetails.address' => 'nullable|string|max:500',
    ];

    public function mount()
    {
        $this->lastCaptureTime = now()->timestamp * 1000;
    }

    public function initializeCamera()
    {
        $this->dispatch('start-camera');
    }

    public function processImage($imageData)
    {
        if (!$this->detectionActive || $this->isScanning) {
            return;
        }

        $now = now()->timestamp * 1000;
        if (($now - $this->lastCaptureTime) < $this->captureInterval) {
            return;
        }

        $this->isScanning = true;
        $this->lastCaptureTime = $now;
        $this->cameraError = null;
        $this->reset(['scanResult', 'showSuccessModal', 'showRegistrationModal']);

        try {
            $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
            $imageBinary = base64_decode($imageData);
            
            if (!$imageBinary) {
                throw new \Exception('Failed to decode image');
            }

            // Generate filename with timestamp
            $filename = time() . '_captured_plate.jpg';
            $relativePath = 'assets/img/plates/' . $filename;
            $fullPath = public_path($relativePath);

            // Create directory if it doesn't exist 
            if (!file_exists(dirname($fullPath))) {
                mkdir(dirname($fullPath), 0755, true);
            }

            // Save the image
            file_put_contents($fullPath, $imageBinary);

            // Send to PlateRecognizer
            $response = Http::withHeaders([
                'Authorization' => 'Token ' . env('PLATE_RECOGNIZER_TOKEN'),
            ])->attach('upload', file_get_contents($fullPath), $filename)
            ->post('https://api.platerecognizer.com/v1/plate-reader/');

            if ($response->failed()) {
                throw new \Exception('API request failed: ' . $response->status());
            }

            $data = $response->json();
            
            if (empty($data['results'])) {
                throw new \Exception('No plate detected in image');
            }

            $plate = $data['results'][0]['plate'] ?? null;
            $score = $data['results'][0]['score'] ?? 0;

            if (!$plate) {
                throw new \Exception('No valid plate number detected');
            }

            // Check if plate exists in database
            $existingPlate = PlateScan::with('owner')->where('plate', $plate)->first();

            // Initialize scanResult with common fields
            $this->scanResult = [
                'plate' => $plate,
                'score' => $score,
                'image_url' => asset($relativePath),
                'existing_record' => (bool)$existingPlate,
                'visit_count' => 0,
                'auto_captured' => true,
            ];

            if ($existingPlate) {
                // Plate found - update scanResult with owner info
                $visitCount = EntranceHistory::whereHas('plateScan', function($query) use ($plate) {
                    $query->where('plate', $plate);
                })->count();

                $this->scanResult['owner'] = $existingPlate->owner;
                $this->scanResult['visit_count'] = $visitCount;

                // Create new scan record
                PlateScan::create([
                    'user_id' => auth()->id(),
                    'plate' => $plate,
                    'score' => $score,
                    'image_path' => $relativePath,
                    'raw_response' => json_encode($data),
                    'is_duplicate' => true,
                    'auto_captured' => true,
                    'owner_id' => $existingPlate->owner->id,
                ]);

                // Add to entrance history
                EntranceHistory::create([
                    'plate_scan_id' => $existingPlate->id,
                    'scanned_at' => now(),
                    'gate_location' => 'Main Entrance Gate',
                ]);

                $this->dispatch('feedback', feedback: "Vehicle Plate Record Found!");
                $this->showSuccessModal = true;
                $this->dispatch('show-modal', type: 'success');
            } else {
                // Plate not found - prompt for registration
                $this->plateToRegister = $plate;
                $this->dispatch('errorfeedback', errorfeedback: "Vehicle Plate Record Not Found!");
                $this->showRegistrationModal = true;
                $this->dispatch('show-modal', type: 'registration');
            }

        } catch (\Exception $e) {
            $this->cameraError = $e->getMessage();
            $this->dispatch('scan-error', message: $e->getMessage());
        } finally {
            $this->isScanning = false;
        }
    }

    public function registerPlate()
    {
        $this->validate();

        // Create new owner
        $owner = Owner::create([
            'name' => $this->ownerDetails['name'],
            'email' => $this->ownerDetails['email'] ?? null,
            'phone' => $this->ownerDetails['phone'],
            'department' => $this->ownerDetails['department'] ?? null,
            'address' => $this->ownerDetails['address'] ?? null,
            'gender' => $this->ownerDetails['gender'] ?? 'Male',
            'photo' => 'user.png',
        ]);

        // Create new plate scan record
        $scanRecord = PlateScan::create([
            'user_id' => auth()->id(),
            'plate' => $this->plateToRegister,
            'score' => $this->scanResult['score'],
            'image_path' => $this->scanResult['image_url'],
            'raw_response' => json_encode(['plate' => $this->plateToRegister]),
            'is_duplicate' => false,
            'auto_captured' => true,
            'owner_id' => $owner->id,
        ]);

        // Add to entrance history
        EntranceHistory::create([
            'plate_scan_id' => $scanRecord->id,
            'scanned_at' => now(),
            'gate_location' => 'Main Entrance Gate',
        ]);

        // Update scan result with owner info
        $this->scanResult['owner'] = $owner;
        $this->scanResult['visit_count'] = 1;
        $this->scanResult['existing_record'] = false;

        $this->dispatch('feedback', feedback: "Vehicle Information registered successfully!");
        $this->reset(['ownerDetails', 'showRegistrationModal']);
        $this->showSuccessModal = true;
    }

    public function handleShowModal($type)
    {
        if ($type === 'success') {
            $this->showSuccessModal = true;
        } elseif ($type === 'registration') {
            $this->showRegistrationModal = true;
        }
    }

    public function closeModals()
    {
        $this->reset(['showSuccessModal', 'showRegistrationModal']);
    }


    public function toggleDetection()
    {
        $this->detectionActive = !$this->detectionActive;
        $this->dispatch('detection-toggled', active: $this->detectionActive);
    }

    public function handleScanError($message)
    {
        $this->cameraError = $message['message'] ?? $message;
    }


    
    public function render()
    {
        return view('livewire.live-plate-capture')->layout('layouts.app');
    }
}
