<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use App\Models\PlateScan;

class LivePlateCapture extends Component
{
    use WithFileUploads;

    public $scanResult;
    public $isScanning = false;
    public $detectionActive = false;
    public $lastCaptureTime = 0;
    public $captureInterval = 2000; // milliseconds between captures
    public $cameraError = null;

    protected $listeners = [
        'initializeCamera' => 'initializeCamera',
        'processLiveCapture' => 'processImage',
        'scan-error' => 'handleScanError'
    ];

    public function mount()
    {
        $this->lastCaptureTime = now()->timestamp * 1000;
    }

    public function initializeCamera()
    {
        $this->dispatch('start-camera');
    }

    // public function processImage($imageData)
    // {
    //     if (!$this->detectionActive || $this->isScanning) {
    //         return;
    //     }

    //     $now = now()->timestamp * 1000;
    //     if (($now - $this->lastCaptureTime) < $this->captureInterval) {
    //         return;
    //     }

    //     $this->isScanning = true;
    //     $this->lastCaptureTime = $now;
    //     $this->cameraError = null;

    //     try {
    //         $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
    //         $imageBinary = base64_decode($imageData);
            
    //         if (!$imageBinary) {
    //             throw new \Exception('Failed to decode image');
    //         }

    //         $filename = 'capture_' . time() . '.jpg';
    //         $directory = 'public/assets/img/plates';
    //         $relativePath = "assets/img/plates/$filename";
    //         $fullPath = "$directory/$filename";

    //         Storage::makeDirectory($directory);
    //         Storage::put($fullPath, $imageBinary);

    //         $response = Http::withHeaders([
    //             'Authorization' => 'Token ' . env('PLATE_RECOGNIZER_TOKEN'),
    //         ])->attach('upload', Storage::get($fullPath), $filename)
    //         ->post('https://api.platerecognizer.com/v1/plate-reader/');

    //         if ($response->failed()) {
    //             throw new \Exception('API request failed: ' . $response->status());
    //         }

    //         $data = $response->json();
            
    //         if (empty($data['results'])) {
    //             throw new \Exception('No plate detected in image');
    //         }

    //         $plate = $data['results'][0]['plate'] ?? 'N/A';
    //         $score = $data['results'][0]['score'] ?? 0;

    //         PlateScan::create([
    //             'user_id' => auth()->id(),
    //             'plate' => $plate,
    //             'score' => $score,
    //             'image_path' => $relativePath,
    //             'raw_response' => json_encode($data),
    //             'auto_captured' => true,
    //         ]);

    //         $this->scanResult = [
    //             'plate' => $plate,
    //             'score' => $score,
    //             'image_url' => asset($relativePath),
    //         ];

    //     } catch (\Exception $e) {
    //         $this->cameraError = $e->getMessage();
    //         $this->dispatch('scan-error', message: $e->getMessage());
    //     } finally {
    //         $this->isScanning = false;
    //     }
    // }

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

            // Save the image directly to public directory
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

            $plate = $data['results'][0]['plate'] ?? 'N/A';
            $score = $data['results'][0]['score'] ?? 0;

            PlateScan::create([
                'user_id' => auth()->id(),
                'plate' => $plate,
                'score' => $score,
                'image_path' => $relativePath,
                'raw_response' => json_encode($data),
                'auto_captured' => true,
            ]);

            $this->scanResult = [
                'plate' => $plate,
                'score' => $score,
                'image_url' => asset($relativePath),
            ];

        } catch (\Exception $e) {
            $this->cameraError = $e->getMessage();
            $this->dispatch('scan-error', message: $e->getMessage());
        } finally {
            $this->isScanning = false;
        }
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
