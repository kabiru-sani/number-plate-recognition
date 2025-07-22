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

    public function scanPlate()
    {
        $this->validate([
            'photo' => 'required|image|max:2048',
        ]);

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
            'image_path' => $relativePath,
            'raw_response' => json_encode($data),
        ]);

        $this->scanResult = [
            'plate' => $plate,
            'score' => $score,
            'image_path' => $relativePath,
        ];
    }

    public function render()
    {
        return view('livewire.plate-scanner')->layout('layouts.app');
    }
}
