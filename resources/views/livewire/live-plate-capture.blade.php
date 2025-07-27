<div>
    <div class="p-4 bg-white rounded-lg shadow-md max-w-xl mx-auto">
        <h4 class="text-lg font-medium mb-4 text-center">Automatic Plate Scanner</h4>

        @if($cameraError)
            <div class="alert alert-danger mb-4">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                {{ $cameraError }}
            </div>
        @endif

        <!-- Camera Feed -->
        <div class="relative bg-black rounded-lg overflow-hidden">
            <video id="liveCamera" class="w-full h-auto" 
                   autoplay playsinline muted style="max-height:360px;"></video>
            
            <!-- Detection overlay -->
            <div id="detectionBox" class="absolute border-2 border-green-500 hidden" 
                 style="pointer-events: none;"></div>
            
            <!-- Status indicator -->
            <div class="absolute top-2 right-2 px-2 py-1 rounded text-xs font-medium
                {{ $detectionActive ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                {{ $detectionActive ? 'DETECTING' : 'PAUSED' }}
            </div>
            
            <!-- Loading indicator -->
            <div wire:loading wire:target="processImage" class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-white text-center">
                    <div class="spinner-border text-light" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Processing image...</p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <div class="mt-4 flex justify-center space-x-3">
            <button class="btn {{ $detectionActive ? 'btn-danger' : 'btn-primary' }}" 
                    wire:click="toggleDetection"
                    wire:loading.attr="disabled">
                <i class="fas {{ $detectionActive ? 'fa-pause' : 'fa-play' }} mr-2"></i>
                {{ $detectionActive ? 'Pause Detection' : 'Start Detection' }}
            </button>
            
            <button class="btn btn-secondary" id="manualCaptureBtn"
                    wire:loading.attr="disabled">
                <i class="fas fa-camera mr-2"></i> Manual Capture
            </button>
        </div>

        <!-- Scan Results -->
        @if($scanResult)
        <div class="mt-6 p-4 bg-gray-50 border border-gray-200 rounded-lg">
            <div class="flex justify-between items-start">
                <div>
                    <h5 class="font-semibold">Plate Number:</h5>
                    <p class="text-2xl font-bold text-blue-600">{{ $scanResult['plate'] }}</p>
                    
                    <h5 class="font-semibold mt-2">Confidence:</h5>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-600 h-2.5 rounded-full" 
                             style="width: {{ $scanResult['score'] * 100 }}%"></div>
                    </div>
                    <p class="text-sm text-gray-600">{{ round($scanResult['score'] * 100, 1) }}%</p>
                </div>
                
                <img src="{{ $scanResult['image_url'] }}" 
                     class="w-32 h-24 object-cover rounded border" 
                     alt="Captured Plate">
            </div>
            
            <div class="mt-3 text-right">
                <button class="text-sm text-blue-600 hover:underline" 
                        wire:click="$set('scanResult', null)">
                    Clear Results
                </button>
            </div>
        </div>
        @endif
    </div>

    @push('scripts')
    <script>
        // Camera elements
        const video = document.getElementById('liveCamera');
        const canvas = document.createElement('canvas');
        const detectionBox = document.getElementById('detectionBox');
        const manualCaptureBtn = document.getElementById('manualCaptureBtn');
        
        // Camera stream
        let stream = null;
        let detectionInterval = null;
        let lastCaptureTime = 0;
        const captureInterval = {{ $captureInterval }};
        
        // Initialize camera
        async function startCamera() {
            try {
                stopCamera();
                
                const constraints = {
                    video: { 
                        facingMode: 'environment',
                        width: { ideal: 1280 },
                        height: { ideal: 720 }
                    } 
                };
                
                stream = await navigator.mediaDevices.getUserMedia(constraints);
                video.srcObject = stream;
                
                return true;
            } catch (err) {
                console.error('Camera error:', err);
                Livewire.dispatch('scan-error', {message: 'Could not access camera: ' + err.message});
                return false;
            }
        }
        
        // Stop camera stream
        function stopCamera() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                stream = null;
            }
            stopDetection();
        }
        
        // Start plate detection
        function startDetection() {
            stopDetection();
            detectionInterval = setInterval(detectPlate, 1000);
        }
        
        // Stop plate detection
        function stopDetection() {
            if (detectionInterval) {
                clearInterval(detectionInterval);
                detectionInterval = null;
            }
            detectionBox.classList.add('hidden');
        }
        
        // Capture image and send to Livewire
        async function captureImage() {
            if (!stream) return;
            
            const now = Date.now();
            if ((now - lastCaptureTime) < captureInterval) {
                return;
            }
            lastCaptureTime = now;
            
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0);
            
            const dataUrl = canvas.toDataURL('image/jpeg');
            Livewire.dispatch('processLiveCapture', {imageData: dataUrl});
            
            // Visual feedback
            video.style.opacity = '0.5';
            setTimeout(() => video.style.opacity = '1', 200);
        }
        
        // Manual capture function
        async function manualCapture() {
            await captureImage();
        }
        
        // Simulate plate detection
        function detectPlate() {
            const detectionActive = @js($detectionActive);
            if (!detectionActive) return;
            
            // Randomly show detection box to simulate plate detection
            if (Math.random() > 0.7) {
                const width = 100 + Math.random() * 100;
                const height = 50 + Math.random() * 30;
                const left = Math.random() * (video.offsetWidth - width);
                const top = Math.random() * (video.offsetHeight - height);
                
                detectionBox.style.width = `${width}px`;
                detectionBox.style.height = `${height}px`;
                detectionBox.style.left = `${left}px`;
                detectionBox.style.top = `${top}px`;
                detectionBox.classList.remove('hidden');
                
                // Auto-capture when "detected"
                setTimeout(() => {
                    detectionBox.classList.add('hidden');
                    captureImage();
                }, 500);
            }
        }
        
        // Event listeners
        manualCaptureBtn.addEventListener('click', manualCapture);
        
        // Listen for Livewire events
        document.addEventListener('livewire:init', () => {
            Livewire.on('detection-toggled', ({ active }) => {
                if (active) {
                    startDetection();
                } else {
                    stopDetection();
                }
            });
            
            Livewire.on('start-camera', async () => {
                await startCamera();
                if (@js($detectionActive)) {
                    startDetection();
                }
            });
            
            Livewire.on('scan-error', ({ message }) => {
                console.error('Scan error:', message);
            });
            
            // Initialize camera after Livewire is ready
            Livewire.dispatch('initializeCamera');
        });
        
        // Clean up on page exit
        document.addEventListener('livewire:before-unload', () => {
            stopCamera();
        });
    </script>
    @endpush
</div>