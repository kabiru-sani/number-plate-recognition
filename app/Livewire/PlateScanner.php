<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\PlateScan;
use App\Models\Owner;
use App\Models\EntranceHistory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class PlateScanner extends Component
{
    use WithFileUploads;

    // public $photo;
    // public $scanResult;
    // public $uploadProgress = 0;

    //  protected $rules = [
    //     'photo' => 'required|image|max:2048', // 2MB max
    // ];

    // public function updatedPhoto()
    // {
    //     $this->validate(['photo' => 'image|max:2048']);
    //     $this->uploadProgress = 0;
    //     $this->simulateUpload();
    // }

    // protected function simulateUpload()
    // {
    //     foreach (range(10, 100, 10) as $percent) {
    //         usleep(200000); // 0.2s delay between updates
    //         $this->uploadProgress = $percent;
    //         $this->dispatch('upload-progress', ['progress' => $percent]);
    //     }
    // }

    // public function scanPlate()
    // {
    //     $this->validate([
    //         'photo' => 'required|image|max:2048',
    //     ]);

    //     // Simulate processing time
    //     sleep(2);

    //     $filename = time() . '_' . $this->photo->getClientOriginalName();
    //     $relativePath = 'assets/img/plates/' . $filename;
    //     $fullPath = public_path($relativePath);

    //     if (!file_exists(dirname($fullPath))) {
    //         mkdir(dirname($fullPath), 0755, true);
    //     }

    //     // Copy from temp to public directory
    //     copy($this->photo->getRealPath(), $fullPath);

    //     // Send to PlateRecognizer
    //     $response = Http::withHeaders([
    //         'Authorization' => 'Token ' . env('PLATE_RECOGNIZER_TOKEN'),
    //     ])->attach('upload', file_get_contents($fullPath), $filename)
    //     ->post('https://api.platerecognizer.com/v1/plate-reader/');

    //     if ($response->failed()) {
    //         $this->addError('photo', 'API request failed.');
    //         return;
    //     }

    //     $data = $response->json();
    //     $plate = $data['results'][0]['plate'] ?? 'N/A';
    //     $score = $data['results'][0]['score'] ?? 0;

    //     // Check if plate exists in database
    //     $existingPlate = PlateScan::where('plate', $plate)->first();
    //     $this->existingRecord = $existingPlate ? true : false;

    //     // Get or generate owner
    //     $faker = fake('en_NG'); // Nigerian context

    //     $owner = $existingPlate ? $existingPlate->owner : Owner::create([
    //         'name' => $faker->firstName . ' ' . $faker->lastName,
    //         'email' => Str::slug($faker->firstName . $faker->lastName, '') . '@example.com',
    //         'phone' => '080' . rand(10000000, 99999999), // Simulate common MTN format
    //         'photo' => 'user.png',
    //     ]);

    //     // Create new scan record
    //     $scanRecord = PlateScan::create([
    //         'user_id' => auth()->id(),
    //         'plate' => $plate,
    //         'score' => $score,
    //         'image_path' => $relativePath,
    //         'raw_response' => json_encode($data),
    //         'is_duplicate' => $this->existingRecord,
    //         'owner_id' => $owner->id,
    //     ]);

    //     // Add to entrance history regardless of whether it's a duplicate
    //     EntranceHistory::create([
    //         'plate_scan_id' => $scanRecord->id,
    //         'scanned_at' => now(),
    //         'gate_location' => 'Main Entrance', // Adjust as needed
    //     ]);

        

    //     // If it's a duplicate, get the frequency count
    //     $visitCount = 0;
    //     if ($this->existingRecord) {
    //         $visitCount = EntranceHistory::whereHas('plateScan', function($query) use ($plate) {
    //             $query->where('plate', $plate);
    //         })->count();
    //     }

    //     $this->scanResult = [
    //         'plate' => $plate,
    //         'score' => $score,
    //         'image_path' => $relativePath,
    //         'existing_record' => $this->existingRecord,
    //         'visit_count' => $visitCount,
    //     ];

    //     $this->uploadProgress = 0;
    // }

    public $photo;
    public $scanResult;
    public $uploadProgress = 0;
    public $showSuccessModal = false;
    public $showRegistrationModal = false;
    public $ownerDetails = [];
    public $plateToRegister = '';

    protected $rules = [
        'photo' => 'required|image|max:2048', // 2MB max
        'ownerDetails.name' => 'required|string|max:255',
        'ownerDetails.email' => 'nullable|email|max:255',
        'ownerDetails.phone' => 'required|string|max:20',
    ];

    public function updatedPhoto()
    {
        $this->validate(['photo' => 'image|max:2048']);
        $this->uploadProgress = 0;
        $this->simulateUpload();
    }

    protected function simulateUpload()
    {
        foreach (range(10, 100, 10) as $percent) {
            usleep(200000); // 0.2s delay between updates
            $this->uploadProgress = $percent;
            $this->dispatch('upload-progress', ['progress' => $percent]);
        }
    }

    public function scanPlate()
    {
        $this->validate([
            'photo' => 'required|image|max:2048',
        ]);

        // Simulate processing time
        sleep(2);

        $filename = time() . '_' . $this->photo->getClientOriginalName();
        $relativePath = 'assets/img/plates/' . $filename;
        $fullPath = public_path($relativePath);

        if (!file_exists(dirname($fullPath))) {
            mkdir(dirname($fullPath), 0755, true);
        }

        // Copy from temp to public directory
        copy($this->photo->getRealPath(), $fullPath);

        // Send to PlateRecognizer
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . env('PLATE_RECOGNIZER_TOKEN'),
        ])->attach('upload', file_get_contents($fullPath), $filename)
        ->post('https://api.platerecognizer.com/v1/plate-reader/');

        if ($response->failed()) {
            $this->addError('photo', 'API request failed.');
            return;
        }

        $data = $response->json();
        $plate = $data['results'][0]['plate'] ?? null;
        $score = $data['results'][0]['score'] ?? 0;

        if (!$plate) {
            $this->addError('photo', 'No plate number detected in the image.');
            return;
        }

        // Check if plate exists in database
        $existingPlate = PlateScan::with('owner')->where('plate', $plate)->first();

        // Initialize scanResult with common fields
        $this->scanResult = [
            'plate' => $plate,
            'score' => $score,
            'image_path' => $relativePath,
            'existing_record' => (bool)$existingPlate, // This will be true or false
            'visit_count' => 0,
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
                'owner_id' => $existingPlate->owner->id,
            ]);

            // Add to entrance history
            EntranceHistory::create([
                'plate_scan_id' => $existingPlate->id,
                'scanned_at' => now(),
                'gate_location' => 'Main Entrance',
            ]);
             $this->showSuccessModal = true;
             $this->dispatch('show-modal', type: 'success');
        } else {
            // Plate not found - prompt for registration
            $this->plateToRegister = $plate;
            $this->scanResult = [
                'plate' => $plate,
                'score' => $score,
                'image_path' => $relativePath,
                'existing_record' => false,
                'visit_count' => 0,
            ];
            $this->showRegistrationModal = true;
            $this->dispatch('show-modal', type: 'registration');
            
            // $this->plateToRegister = $plate;
            // $this->showRegistrationModal = true;
        }

        $this->uploadProgress = 0;

    }

    public function registerPlate()
    {
        $this->validate();

        // Create new owner
        $owner = Owner::create([
            'name' => $this->ownerDetails['name'],
            'email' => $this->ownerDetails['email'] ?? null,
            'phone' => $this->ownerDetails['phone'],
            'photo' => 'user.png',
        ]);

        // Create new plate scan record
        $scanRecord = PlateScan::create([
            'user_id' => auth()->id(),
            'plate' => $this->plateToRegister,
            'score' => $this->scanResult['score'],
            'image_path' => $this->scanResult['image_path'],
            'raw_response' => json_encode(['plate' => $this->plateToRegister]),
            'is_duplicate' => false,
            'owner_id' => $owner->id,
        ]);

        // Add to entrance history
        EntranceHistory::create([
            'plate_scan_id' => $scanRecord->id,
            'scanned_at' => now(),
            'gate_location' => 'Main Entrance',
        ]);

        // Update scan result with owner info
        $this->scanResult['owner'] = $owner;
        $this->scanResult['visit_count'] = 1;

        // Reset and show success
        $this->reset(['ownerDetails', 'showRegistrationModal']);
        $this->showSuccessModal = true;
    }

    public function closeModals()
    {
        $this->reset(['showSuccessModal', 'showRegistrationModal', 'ownerDetails']);
    }


    public function render()
    {
        return view('livewire.plate-scanner')->layout('layouts.app');
    }
}
