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
        .confidence-meter {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
        }
        .confidence-fill {
            height: 100%;
            background: linear-gradient(to right, #dc3545, #ffc107, #198754);
        }
    </style>

    <div class="container py-4">
        <div class="mb-4">
            <h3 class="fw-bold text-primary">Plate Image Scanner</h3>
            <p class="text-muted mb-2">Upload an image of a vehicle license plate for recognition</p>
            <nav>
                <ol class="breadcrumb small">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Scanner</li>
                </ol>
            </nav>
        </div>

        <div class="card border-0 shadow-sm mb-5">
            <div class="card-header bg-white">
                <h5 class="mb-0 fw-semibold">Scan New Plate</h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="scanPlate" enctype="multipart/form-data">
                    <label class="form-label fw-medium mb-2">Upload Plate Image</label>

                    <div class="dropzone p-5 text-center rounded {{ $errors->has('photo') ? 'has-error' : '' }} {{ $uploadProgress > 0 ? 'active' : '' }}"
                         onclick="document.getElementById('fileInput').click()"
                         wire:loading.class="active"
                         wire:target="photo">
                        <div wire:loading.remove wire:target="photo">
                            <i class="fa fa-upload fa-3x text-primary mb-2"></i>
                            <h5 class="fw-semibold">Click or drag image here</h5>
                            <p class="text-muted">Only JPG/PNG up to 2MB. Clear images perform best.</p>
                        </div>
                        <div wire:loading wire:target="photo">
                            @if($uploadProgress > 0)
                                <div>
                                    <x-action-loader target="photo" />
                                    <p class="fw-medium mb-2">Uploading...</p>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar progress-bar-striped bg-primary" style="width: {{ $uploadProgress }}%"></div>
                                    </div>
                                    <small class="text-muted d-block mt-1">{{ $uploadProgress }}% complete</small>
                                </div>
                            @endif
                        </div>
                        <input id="fileInput" type="file" wire:model="photo" class="d-none" accept="image/*">
                    </div>

                    @error('photo') 
                        <div class="text-danger small mt-2">
                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror

                    @if($photo && !$errors->has('photo'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            <i class="fa fa-check-circle me-1"></i>
                            <strong>{{ $photo->getClientOriginalName() }}</strong> selected.
                            <button type="button" class="btn-close" wire:click="$set('photo', null)"></button>
                        </div>
                    @endif

                    <div class="text-end mt-3">
                        <button class="btn btn-primary px-4" type="submit" wire:loading.attr="disabled">
                            <span>Scan Plate</span>
                            <x-action-loader target="scanPlate" />
                        </button>
                    </div>
                </form>

                @if ($scanResult)
                    <div class="mt-5 border-start border-success ps-4 pt-4">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <h4 class="text-success fw-bold">Scan Results</h4>
                                <p class="text-muted small mb-3">License plate successfully detected</p>

                                <div class="mb-3">
                                    <label class="form-label text-muted">License Plate</label>
                                    <div class="display-4 fw-bold text-dark">{{ strtoupper($scanResult['plate']) }}</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-muted">Confidence Score</label>
                                    <div class="d-flex align-items-center">
                                        <span class="me-2 fw-bold">{{ round($scanResult['score'] * 100, 2) }}%</span>
                                        <div class="confidence-meter flex-grow-1">
                                            <div class="confidence-fill" style="width: {{ $scanResult['score'] * 100 }}%"></div>
                                        </div>
                                    </div>
                                    <small class="text-muted">Higher score = better match</small>
                                </div>

                                @if($scanResult['existing_record'])
                                    <div class="alert alert-warning mt-4">
                                        <i class="fa fa-info-circle me-2"></i>
                                        This vehicle was seen before. Total visits:
                                        <strong>{{ $scanResult['visit_count'] }}</strong>
                                    </div>
                                @else
                                    <div class="alert alert-success mt-4">
                                        <i class="fa fa-check-circle me-2"></i>
                                        This is the first detection of this vehicle.
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6 text-center">
                                <div class="position-relative">
                                    <img src="{{ asset($scanResult['image_path']) }}" 
                                         class="img-fluid rounded shadow-sm border"
                                         style="max-height: 230px;"
                                         alt="Scanned Plate">
                                    <div class="position-absolute top-0 start-0 bg-success text-white px-2 py-1 small">
                                        <i class="fa fa-car me-1"></i> Detected
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <button wire:click="$set('scanResult', null)" class="btn btn-outline-secondary btn-sm">
                                <i class="fa fa-redo me-1"></i> New Scan
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('livewire.modals.success-modal')
    @include('livewire.modals.owner-register-modal')
</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:init', function() {
            Livewire.on('show-modal', (data) => {
                if (data.type === 'success') {
                    var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                    successModal.show();
                } else if (data.type === 'registration') {
                    var registrationModal = new bootstrap.Modal(document.getElementById('registrationModal'));
                    registrationModal.show();
                }
            });
        });
    </script>
@endpush

