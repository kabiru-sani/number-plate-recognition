<div>
    <div class="p-4 bg-white rounded-lg shadow-md max-w-xl mx-auto">
        <h4 class="text-lg font-medium mb-4 text-center">Automatic Plate Scanner</h4>

        @if($cameraError)
            <div class="alert alert-danger mb-4">
                <i class="fa fa-exclamation-triangle mr-2"></i>
                {{ $cameraError }}
            </div>
        @endif

        <!-- Camera Feed -->
        {{-- <div class="relative bg-black rounded-lg overflow-hidden">
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
        <div class="mt-4 flex justify-center align-items-center gap-3">
            <!-- Custom Toggle Switch -->
            <div class="toggle-switch">
                <input type="checkbox" class="toggle-switch-checkbox" 
                    id="detectionToggle"
                    wire:click="toggleDetection"
                    wire:loading.attr="disabled"
                    {{ $detectionActive ? 'checked' : '' }}>
                <label class="toggle-switch-label" for="detectionToggle">
                    <span class="toggle-switch-inner"></span>
                    <span class="toggle-switch-switch"></span>
                </label>
                <span class="toggle-switch-text ms-2">
                    {{ $detectionActive ? 'Pause Detection' : 'Start Detection' }}
                </span>
            </div>
            
            <!-- Manual Capture Button -->
            <button class="btn btn-primary" id="manualCaptureBtn"
                    wire:loading.attr="disabled">
                <i class="fa fa-camera me-2"></i> Manual Capture
            </button>
        </div> --}}
        <div class="relative bg-black rounded-lg overflow-hidden">
            <video id="liveCamera" class="w-full h-auto" autoplay playsinline muted style="max-height:360px;"></video>

            <!-- Detection overlay (optional visual box) -->
            <div id="detectionBox" class="absolute border-2 border-green-500 hidden" style="pointer-events: none;"></div>

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
        <div class="mt-4 flex justify-center align-items-center gap-3">
            <!-- Custom Toggle Switch -->
            <div class="toggle-switch">
                <input type="checkbox" class="toggle-switch-checkbox" 
                    id="detectionToggle"
                    wire:click="toggleDetection"
                    wire:loading.attr="disabled"
                    {{ $detectionActive ? 'checked' : '' }}>
                <label class="toggle-switch-label" for="detectionToggle">
                    <span class="toggle-switch-inner"></span>
                    <span class="toggle-switch-switch"></span>
                </label>
                <span class="toggle-switch-text ms-2">
                    {{ $detectionActive ? 'Pause Detection' : 'Start Detection' }}
                </span>
            </div>

            <!-- Manual Capture (optional fallback) -->
            <button class="btn btn-primary" id="manualCaptureBtn" wire:loading.attr="disabled">
                <i class="fa fa-camera me-2"></i> Manual Capture
            </button>
        </div>


        <style>
            .toggle-switch {
                position: relative;
                display: inline-flex;
                align-items: center;
            }
            
            .toggle-switch-checkbox {
                display: none;
            }
            
            .toggle-switch-label {
                display: flex;
                align-items: center;
                cursor: pointer;
            }
            
            .toggle-switch-inner {
                width: 50px;
                height: 26px;
                background: #ba0d0d;
                border-radius: 13px;
                position: relative;
                transition: background 0.3s ease;
            }
            
            .toggle-switch-switch {
                position: absolute;
                width: 22px;
                height: 22px;
                background: white;
                border-radius: 50%;
                top: 2px;
                left: 2px;
                transition: transform 0.3s ease;
                box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            }
            
            .toggle-switch-checkbox:checked + .toggle-switch-label .toggle-switch-inner {
                background: #077e03; /* Bootstrap primary color */
            }
            
            .toggle-switch-checkbox:checked + .toggle-switch-label .toggle-switch-switch {
                transform: translateX(24px);
            }
            
            /* Disabled state */
            .toggle-switch-checkbox:disabled + .toggle-switch-label {
                opacity: 0.6;
                cursor: not-allowed;
            }
        </style>

        @if($scanResult)
            <div class="card shadow-sm rounded-lg mt-4">
            <div class="card-body p-4">
                <div class="row">
                <!-- Left: Scan Details -->
                <div class="col-md-7">
                    <h4 class="fw-bold text-primary mb-4">Scan Results</h4>

                    <!-- Plate Detected Badge -->
                    <div class="d-flex align-items-center mb-4">
                    <span class="badge bg-success me-3"><i class="fa fa-check-circle"></i> Plate Detected</span>
                    <small class="text-muted">License plate recognized</small>
                    </div>

                    <!-- License Plate -->
                    <div class="mb-4">
                    <label class="form-label text-secondary mb-1">License Plate Number</label>
                    <div class="display-4 fw-bold text-dark">{{ strtoupper($scanResult['plate']) }}</div>
                    </div>

                    <!-- Confidence Bar -->
                    <div class="mb-4">
                    <label class="form-label text-secondary mb-1">Confidence Score</label>
                    <div class="d-flex align-items-center">
                        <strong class="me-3">{{ round($scanResult['score'] * 100, 2) }}%</strong>
                        <div class="progress flex-grow-1" style="height: 8px;">
                        <div class="progress-bar {{ $scanResult['score'] >= 0.8 ? 'bg-success' : ($scanResult['score'] >= 0.5 ? 'bg-warning' : 'bg-danger') }}"
                            role="progressbar"
                            style="width: {{ $scanResult['score'] * 100 }}%">
                        </div>
                        </div>
                    </div>
                    <small class="text-muted mt-1 d-block">Higher percentage indicates more accurate recognition</small>
                    </div>

                    <!-- Visit Info -->
                    @if(!empty($scanResult['existing_record']))
                    <div class="alert alert-warning d-flex align-items-center">
                    <i class="fa fa-info-circle fa-lg me-2"></i>
                    <div>
                        This vehicle was detected before. Total entries:
                        <strong>{{ $scanResult['visit_count'] }}</strong>
                    </div>
                    </div>
                    @else
                    <div class="alert alert-success d-flex align-items-center">
                    <i class="fa fa-thumbs-up fa-lg me-2"></i>
                    <div>First‑time detection of this vehicle.</div>
                    </div>
                    @endif
                </div>

                <!-- Right: Plate Image -->
                <div class="col-md-5 text-center">
                    <div class="position-relative d-inline-block">
                    <img src="{{ asset($scanResult['image_url']) }}"
                        class="img-fluid rounded border"
                        style="max-height: 240px;"
                        alt="Scanned Plate">
                    <div class="position-absolute top-2 start-2 bg-success text-white small px-2 py-1 rounded">
                        <i class="fa fa-camera fa-sm"></i> Detected
                    </div>
                    </div>
                </div>
                </div>

                <!-- Clear / New Scan Button -->
                <div class="text-end mt-4">
                <button wire:click="$set('scanResult', null)"
                        class="btn btn-outline-secondary btn-sm">
                    <i class="fa fa-redo"></i> New Scan
                </button>
                </div>
            </div>
            </div>
        @endif

    </div>

    {{-- @push('scripts')
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
    @endpush --}}

    @push('scripts')
    <script>
        const video = document.getElementById('liveCamera');
        const canvas = document.createElement('canvas');
        const manualCaptureBtn = document.getElementById('manualCaptureBtn');

        let stream = null;
        let detectionInterval = null;
        let lastCaptureTime = 0;
        const captureInterval = {{ $captureInterval }}; // in ms

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

        function stopCamera() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
                stream = null;
            }
            stopDetection();
        }

        function startDetection() {
            stopDetection(); // clear any previous interval
            detectionInterval = setInterval(() => {
                captureImage();
            }, captureInterval);
        }

        function stopDetection() {
            if (detectionInterval) {
                clearInterval(detectionInterval);
                detectionInterval = null;
            }
        }

        async function captureImage() {
            if (!stream) return;

            const now = Date.now();
            if ((now - lastCaptureTime) < captureInterval) return;
            lastCaptureTime = now;

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0);

            const dataUrl = canvas.toDataURL('image/jpeg');
            Livewire.dispatch('processLiveCapture', {imageData: dataUrl});

            // Flash feedback
            video.style.opacity = '0.5';
            setTimeout(() => video.style.opacity = '1', 150);
        }

        manualCaptureBtn.addEventListener('click', captureImage);

        document.addEventListener('livewire:init', () => {
            Livewire.on('detection-toggled', ({ active }) => {
                if (active) startDetection();
                else stopDetection();
            });

            Livewire.on('start-camera', async () => {
                await startCamera();
                if (@js($detectionActive)) startDetection();
            });

            Livewire.on('scan-error', ({ message }) => {
                console.error('Scan error:', message);
            });

            Livewire.dispatch('initializeCamera');
        });

        document.addEventListener('livewire:before-unload', () => {
            stopCamera();
        });
    </script>
    @endpush

   
</div>