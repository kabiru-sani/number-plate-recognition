<div>
    <div class="p-4 bg-white rounded shadow-md max-w-xl mx-auto">
        <h4 class="text-lg font-medium mb-2">Live Plate Capture</h4>

        <video id="liveCamera" class="w-full rounded border" autoplay playsinline muted
            style="max-height:360px;"></video>
        <canvas id="snapshotCanvas" class="hidden"></canvas>

        <div class="mt-3 text-center">
            <button class="btn btn-primary" onclick="captureImage()">Capture & Scan</button>
        </div>

        @if($scanResult)
        <div class="mt-4 p-3 bg-light border rounded">
            <h5>Plate: <strong>{{ $scanResult['plate'] }}</strong></h5>
            <p>Confidence: <strong>{{ $scanResult['score'] }}%</strong></p>
            <img src="{{ $scanResult['image_url'] }}" class="img-fluid rounded mt-2" alt="Captured Plate">
        </div>
        @endif
    </div>
</div>
@push('scripts')
<script>
    const video = document.getElementById('liveCamera');
        const canvas = document.getElementById('snapshotCanvas');

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => video.srcObject = stream)
            .catch(err => alert('Camera access denied. Please allow and reload.'));

        function captureImage() {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0);

            const dataUrl = canvas.toDataURL('image/jpeg');
            Livewire.emit('processLiveCapture', dataUrl);
        }
</script>
@endpush