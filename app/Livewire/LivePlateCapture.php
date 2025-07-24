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
        // 1. Decode base64 blob
        $img = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Blob));
        
        // 2. Define new filename and public path
        $filename = time() . '_live_capture.jpg';
        $relativePath = 'assets/img/plates/' . $filename;
        $fullPath = public_path($relativePath);

        // 3. Ensure directory exists
        if (!file_exists(dirname($fullPath))) {
            mkdir(dirname($fullPath), 0755, true);
        }

        // 4. Save file manually to public path
        file_put_contents($fullPath, $img);

        // 5. Call PlateRecognizer API
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . env('PLATE_RECOGNIZER_TOKEN'),
        ])->attach(
            'upload',
            $img,
            $filename
        )->post('https://api.platerecognizer.com/v1/plate-reader/');

        if ($response->failed()) {
            $this->addError('photo', 'Scan failed, please try again.');
            return;
        }

        $data = $response->json();
        $plate = data_get($data, 'results.0.plate', 'N/A');
        $score = round(data_get($data, 'results.0.score', 0) * 100, 2);

        // 6. Store record in DB
        PlateScan::create([
            'user_id'      => auth()->id(),
            'plate'        => $plate,
            'score'        => $score,
            'image_path'   => $relativePath, // so it works with asset()
            'raw_response' => json_encode($data),
        ]);

        // 7. Update UI
        $this->scanResult = [
            'plate'     => $plate,
            'score'     => $score,
            'image_url' => asset($relativePath),
        ];
    }

    
    public function render()
    {
        return view('livewire.live-plate-capture')->layout('layouts.app');
    }
}
