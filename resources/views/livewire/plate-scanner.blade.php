
<div>
    <style>
        .dropzone {
            transition: all 0.3s ease;
            border: 2px dashed #ced4da;
            background-color: #f8f9fa;
            cursor: pointer;
        }
        .dropzone:hover {
            background-color: #e9ecef;
            border-color: #adb5bd;
        }
        .dropzone.active {
            border-color: #198754;
            background-color: #e6f7ee;
        }
        .dropzone.has-error {
            border-color: #dc3545;
            background-color: #fce8e8;
        }
        .progress-bar {
            transition: width 0.3s ease;
        }
        .plate-result {
            border-left: 4px solid #198754;
            background-color: #f8f9fa;
        }
        .confidence-meter {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
        }
        .confidence-fill {
            height: 100%;
            background: linear-gradient(90deg, #dc3545, #ffc107, #198754);
        }
    </style>

    <div class="min-height-200px">
        <div class="page-header mb-4">
            <div class="title">
                <h4 class="fw-bold text-primary">Plate Image Scanner</h4>
                <p class="text-muted">Upload an image of a vehicle license plate for recognition</p>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Scanner</li>
                </ol>
            </nav>
        </div>

        <div class="card shadow-sm border-0 rounded-lg overflow-hidden mb-5">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="mb-0 fw-semibold">Scan New Plate</h5>
            </div>
            <div class="card-body p-4">
                <form wire:submit.prevent="scanPlate" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label class="form-label fw-semibold mb-3">Upload Plate Image</label>
                        
                        <div class="dropzone rounded-3 p-5 text-center mb-2 {{ $errors->has('photo') ? 'has-error' : '' }} {{ $uploadProgress > 0 ? 'active' : '' }}"
                             onclick="document.getElementById('fileInput').click()"
                             wire:loading.class="active"
                             wire:target="photo">
                            <div wire:loading.remove wire:target="photo">
                                <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                <h5 class="mb-2">Drag & drop or click to browse</h5>
                                <p class="text-muted mb-1">Supports JPG, PNG (Max 2MB)</p>
                                <small class="text-muted">High quality images work better</small>
                            </div>
                            <div wire:loading wire:target="photo" class="py-3">
                                @if($uploadProgress > 0)
                                    <div>
                                        <div class="spinner-border text-primary mb-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <h5 class="mb-1">Uploading Image...</h5>
                                        <div class="progress mt-3" style="height: 8px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
                                                role="progressbar" 
                                                style="width: {{ $uploadProgress }}%"
                                                aria-valuenow="{{ $uploadProgress }}" 
                                                aria-valuemin="0" 
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <small class="text-muted mt-2 d-block">{{ $uploadProgress }}% complete</small>
                                    </div>
                                @endif
                            </div>
                            
                            <input id="fileInput" type="file" wire:model="photo" accept="image/*" class="d-none">
                        </div>
                        
                        @error('photo') 
                            <div class="text-danger small mt-2 d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i> {{ $message }}
                            </div> 
                        @enderror
                        
                        @if($photo && !$errors->has('photo'))
                            <div class="alert alert-success alert-dismissible fade show mt-3 py-2 small" role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-check-circle me-2"></i>
                                    <span>Image selected: <strong>{{ $photo->getClientOriginalName() }}</strong></span>
                                </div>
                                <button type="button" class="btn-close p-0" style="font-size: 0.7rem; top: -2px;" wire:click="$set('photo', null)"></button>
                            </div>
                        @endif
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary px-4 py-2" 
                                type="submit" 
                                wire:loading.attr="disabled"
                                wire:target="photo,scanPlate"
                                {{ !$photo ? 'disabled' : '' }}>
                            Scan Plate
                            {{-- <div wire:loading wire:target="submit"><x-action-loader /></div> --}}
                        </button>
                    </div>
                </form>

                @if ($scanResult)
                    <div class="plate-result rounded p-4 mt-5">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="fw-bold mb-3">Scan Results</h4>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success text-white rounded-circle p-2 me-3">
                                        <i class="fa fa-check fa-lg"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-0">Plate Detected</h5>
                                        <span class="text-muted">License plate recognized</span>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label text-muted mb-1">License Plate Number</label>
                                    <div class="display-4 fw-bold text-dark">{{ strtoupper($scanResult['plate']) }}</div>
                                </div>
                                
                                <div>
                                    <label class="form-label text-muted mb-2">Confidence Score</label>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="fw-bold me-2">{{ round($scanResult['score'] * 100, 2) }}%</span>
                                        <div class="confidence-meter flex-grow-1">
                                            <div class="confidence-fill" style="width: {{ $scanResult['score'] * 100 }}%"></div>
                                        </div>
                                    </div>
                                    <small class="text-muted">Higher percentage indicates more accurate recognition</small>
                                </div>
                            </div>
                            
                            <div class="col-md-6 text-center mt-4 mt-md-0">
                                <div class="position-relative d-inline-block">
                                    <img src="{{ asset($scanResult['image_path']) }}"
                                         class="img-fluid rounded shadow-sm border"
                                         style="max-height: 220px;"
                                         alt="Scanned Plate">
                                    <div class="position-absolute top-0 start-0 bg-success text-white px-2 py-1 small">
                                        <i class="fa fa-car me-1"></i> Detected
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fas fa-download me-1"></i> Download
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-redo me-1"></i> Rescan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>


