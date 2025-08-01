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

    public $photo;
    public $scanResult;
    public $uploadProgress = 0;

     protected $rules = [
        'photo' => 'required|image|max:2048', // 2MB max
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
        $plate = $data['results'][0]['plate'] ?? 'N/A';
        $score = $data['results'][0]['score'] ?? 0;

        // Check if plate exists in database
        $existingPlate = PlateScan::where('plate', $plate)->first();
        $this->existingRecord = $existingPlate ? true : false;

        // Get or generate owner
        $faker = fake('en_NG'); // Nigerian context

        $owner = $existingPlate ? $existingPlate->owner : Owner::create([
            'name' => $faker->firstName . ' ' . $faker->lastName,
            'email' => Str::slug($faker->firstName . $faker->lastName, '') . '@example.com',
            'phone' => '080' . rand(10000000, 99999999), // Simulate common MTN format
            'photo' => 'user.png',
        ]);

        // Create new scan record
        $scanRecord = PlateScan::create([
            'user_id' => auth()->id(),
            'plate' => $plate,
            'score' => $score,
            'image_path' => $relativePath,
            'raw_response' => json_encode($data),
            'is_duplicate' => $this->existingRecord,
            'owner_id' => $owner->id,
        ]);

        // Add to entrance history regardless of whether it's a duplicate
        EntranceHistory::create([
            'plate_scan_id' => $scanRecord->id,
            'scanned_at' => now(),
            'gate_location' => 'Main Entrance', // Adjust as needed
        ]);

        

        // If it's a duplicate, get the frequency count
        $visitCount = 0;
        if ($this->existingRecord) {
            $visitCount = EntranceHistory::whereHas('plateScan', function($query) use ($plate) {
                $query->where('plate', $plate);
            })->count();
        }

        $this->scanResult = [
            'plate' => $plate,
            'score' => $score,
            'image_path' => $relativePath,
            'existing_record' => $this->existingRecord,
            'visit_count' => $visitCount,
        ];

        $this->uploadProgress = 0;
    }

    public function render()
    {
        return view('livewire.plate-scanner')->layout('layouts.app');
    }
}
