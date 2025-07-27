<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\PlateScan;
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
        
        // Real implementation would hook into Livewire's upload events
        $this->simulateUpload();
    }

    protected function simulateUpload()
    {
        foreach (range(10, 100, 10) as $percent) {
            usleep(300000); // 0.3s delay between updates
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

        PlateScan::create([
            'user_id' => auth()->id(),
            'plate' => $plate,
            'score' => $score,
            'image_path' => $relativePath,
            'raw_response' => json_encode($data),
        ]);

        $this->scanResult = [
            'plate' => $plate,
            'score' => $score,
            'image_path' => $relativePath,
        ];

        $this->uploadProgress = 0;
    }

    public function render()
    {
        return view('livewire.plate-scanner')->layout('layouts.app');
    }
}
