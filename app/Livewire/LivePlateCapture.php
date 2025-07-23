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

    public $liveImage;      // Holds the captured image blob
    public $scanResult = []; // Holds latest scan results

    protected $listeners = ['processLiveCapture'];

    public function processLiveCapture($base64Blob)
    {
        // Decode blob and store in public storage
        $img = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Blob));
        $filename = 'plates/live_' . time() . '.jpg';
        Storage::disk('public')->put($filename, $img);

        // Call PlateRecognizer
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . env('PLATE_RECOGNIZER_TOKEN'),
        ])->attach(
            'upload',
            $img,
            basename($filename)
        )->post('https://api.platerecognizer.com/v1/plate-reader/');

        if ($response->failed()) {
            $this->notify('Scan failed, please try again.', 'error');
            return;
        }

        $data = $response->json();
        $plate = data_get($data, 'results.0.plate', 'N/A');
        $score = round(data_get($data, 'results.0.score', 0) * 100, 2);

        PlateScan::create([
            'user_id'      => auth()->id(),
            'plate'        => $plate,
            'score'        => $score,
            'image_path'   => $filename,
            'raw_response' => json_encode($data),
        ]);

        $this->scanResult = [
            'plate'     => $plate,
            'score'     => $score,
            'image_url' => Storage::url($filename),
        ];
    }
    
    public function render()
    {
        return view('livewire.live-plate-capture')->layout('layouts.app');
    }
}
