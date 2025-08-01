<div class="modal fade" id="scanModal" tabindex="-1" data-bs-backdrop="none" data-bs-keyboard="false" wire:ignore.self>
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            @if ($selectedScan)
                <div class="modal-header bg-success ">
                    <h5 class="modal-title d-flex align-items-center text-white">
                        <i class="fa fa-car me-2"></i>
                            Plate Scan Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" onclick="window.dispatchEvent(new Event('submit'))">X</button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-7 mb-4 mb-md-0">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="position-relative mb-3">
                                        <img src="{{ asset($selectedScan->image_path) }}" 
                                             class="img-fluid rounded" 
                                             alt="Captured Plate"
                                             style="max-height: 200px;">
                                        <span class="position-absolute top-0 start-0 bg-success text-white px-2 py-1 small rounded-end">
                                            <i class="fa fa-check-circle me-1"></i> Verified
                                        </span>
                                    </div>
                                    
                                    <div class="d-flex justify-content-center align-items-center mb-3">
                                        <div class="me-3">
                                            <div class="bg-light rounded-circle p-2">
                                                <i class="fa fa-car text-primary fa-lg"></i>
                                            </div>
                                        </div>
                                        <div class="text-start">
                                            <h4 class="mb-0 fw-bold">{{ strtoupper($selectedScan->plate) }}</h4>
                                            <small class="text-muted">License Plate</small>
                                        </div>
                                    </div>
                                    
                                    <div class="progress mb-2" style="height: 8px;">
                                        <div class="progress-bar bg-success" 
                                             role="progressbar" 
                                             style="width: {{ $selectedScan->score * 100 }}%"
                                             aria-valuenow="{{ $selectedScan->score * 100 }}" 
                                             aria-valuemin="0" 
                                             aria-valuemax="100">
                                        </div>
                                    </div>
                                    <p class="mb-0 small text-muted">
                                        Confidence Score: <strong class="text-dark">{{ round($selectedScan->score * 100, 2) }}%</strong>
                                    </p>
                                </div>
                            </div>
                        </div>

                        @if($selectedScan->owner)
                            <div class="col-md-5">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-header bg-gradient text-white">
                                        <h6 class="mb-0 fw-semibold">
                                            <i class="fa fa-user-circle me-2"></i> Vehicle Owner Information
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-column text-center">
                                            <img src="{{ asset('admin/vendors/images/team.png') }}" 
                                                class="rounded-circle shadow mb-3" 
                                                alt="Owner Photo" 
                                                style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #0d6efd;">
                                            
                                            <h5 class="fw-bold text-dark mb-1">{{ $selectedScan->owner->name }}</h5>
                                            
                                            <p class="text-muted small mb-2">
                                                <i class="fa fa-envelope me-1"></i> {{ $selectedScan->owner->email }}<br>
                                                <i class="fa fa-phone me-1"></i> {{ $selectedScan->owner->phone }}
                                            </p>

                                            <div class="bg-light rounded p-2 w-100 mt-2 shadow-sm text-start">
                                                <p class="mb-1"><strong>Gender:</strong> {{ $selectedScan->owner->gender ?? 'N/A' }}</p>
                                                <p class="mb-1"><strong>State of Origin:</strong> {{ $selectedScan->owner->state_of_origin ?? 'N/A' }}</p>
                                                <p class="mb-0"><strong>Address:</strong> {{ $selectedScan->owner->address ?? 'Not Provided' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- <div class="col-md-5">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0 fw-semibold">
                                        <i class="fa fa-code me-2"></i>
                                        API Response Data
                                    </h6>
                                </div>
                                <div class="card-body p-0">
                                    <div class="p-3" style="max-height: 300px; overflow-y: auto;">
                                        <pre class="mb-0 p-3 bg-dark text-white rounded" style="white-space: pre-wrap; font-family: 'Courier New', monospace; font-size: 13px;">{{ json_encode(json_decode($selectedScan->raw_response), JSON_PRETTY_PRINT) }}</pre>
                                    </div>
                                </div>
                                <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="fas fa-clock me-1"></i>
                                        Scanned on {{ $selectedScan->created_at->format('M j, Y g:i A') }}
                                    </small>
                                    <button class="btn btn-sm btn-outline-primary" onclick="copyToClipboard()">
                                        <i class="fa fa-copy me-1"></i> Copy
                                    </button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" onclick="window.dispatchEvent(new Event('submit'))" data-bs-dismiss="modal">
                        <i class="fa fa-times me-1"></i> Close
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    window.addEventListener('submit', event => {
        document.getElementById("scanModal").click();
    })
</script>
<script>
  window.addEventListener('show-scan-modal', () => {
    const modal = new bootstrap.Modal(document.getElementById('scanModal'));
    modal.show();
  });
  window.addEventListener('close-modal', () => {
    const modalEl = document.getElementById('scanModal');
    const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
    modal.hide();
  });
  function copyToClipboard(btn) {
    const raw = btn.closest('.card-footer').previousElementSibling.querySelector('pre').innerText;
    navigator.clipboard.writeText(raw).then(() => {
      const orig = btn.innerHTML;
      btn.innerHTML = '<i class="fas fa-check me-1"></i> Copied!';
      setTimeout(() => btn.innerHTML = orig, 1500);
    });
  }
</script>
@endpush