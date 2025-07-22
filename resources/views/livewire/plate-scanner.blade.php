<div>
    <style>
        .dropzone:hover {
            background-color: #f1f1f1;
            transition: all 0.2s ease-in-out;
        }
        .dropzone:focus-within {
            outline: 2px dashed #198754;
        }
    </style>

    <div class="min-height-200px">
        <div class="page-header mb-4">
            <div class="title">
                <h4>Plate Image Scanner</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Scanner</li>
                </ol>
            </nav>
        </div>

        <div class="card-box p-4 mb-30 shadow-sm border rounded bg-white">
            <form wire:submit.prevent="scanPlate" enctype="multipart/form-data">
                <label class="form-label fw-bold mb-2">Upload Plate Image</label>
                <div class="dropzone rounded border border-dashed bg-light text-center p-4 mb-3" 
                     onclick="document.getElementById('fileInput').click()" 
                     style="cursor: pointer;">
                    <i class="fa fa-cloud-upload fa-2x text-primary mb-2"></i>
                    <p class="mb-1 text-muted">Drag and drop or click to upload</p>
                    <small class="text-secondary">Supported formats: JPG, PNG. Max size: 2MB</small>
                    <input id="fileInput" type="file" wire:model="photo" accept="image/*" hidden>
                </div>
                @error('photo') <div class="text-danger small mb-2">{{ $message }}</div> @enderror

                <div class="text-end">
                    <button class="btn btn-success" type="submit" wire:loading.attr="disabled">
                        <i class="fa fa-search me-1"></i> Scan Plate
                    </button>
                </div>
            </form>

            <div wire:loading wire:target="scanPlate" class="mt-4 text-info">
                <i class="fa fa-spinner fa-spin me-2"></i>Scanning image, please wait...
            </div>

            @if ($scanResult)
                <div class="alert alert-success mt-4">
                    <h5 class="mb-2">✅ Plate Detected: <strong>{{ strtoupper($scanResult['plate']) }}</strong></h5>
                    <p>Confidence Score: {{ round($scanResult['score'] * 100, 2) }}%</p>
                    <img src="{{ asset($scanResult['image_path']) }}"
                    class="img-thumbnail mt-2"
                    style="max-width: 300px;"
                    alt="Scanned Plate">
                </div>
            @endif
        </div>
    </div>
</div>



