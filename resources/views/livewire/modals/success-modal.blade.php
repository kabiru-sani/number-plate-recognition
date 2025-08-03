<!-- Enhanced Success Modal -->
<div class="modal fade" wire:ignore.self id="successModal" tabindex="-1" aria-hidden="true">
    <style>
        .modal-header {
            border-radius: 0.5rem 0.5rem 0 0 !important;
        }
        .modal-content {
            border-radius: 0.5rem !important;
        }
        .bg-light {
            background-color: #f8fafc !important;
        }
    </style>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content shadow border-0">
            <!-- Modal Header -->
            <div class="modal-header text-white" 
                 style="background: linear-gradient(135deg, #198754 0%, #0d6e3d 100%);">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-25 rounded-circle p-2 me-3">
                        @if($scanResult['existing_record'] ?? false)
                            <i class="fa fa-check-circle fa-lg"></i>
                        @else
                            <i class="fa fa-car fa-lg"></i>
                        @endif
                    </div>
                    <div>
                        <h5 class="modal-title mb-0">
                            @if($scanResult['existing_record'] ?? false)
                                Vehicle Information Found
                            @else
                                New Vehicle Registered
                            @endif
                        </h5>
                        <p class="small mb-0 opacity-75">
                            {{ now()->format('l, F j, Y \a\t g:i A') }}
                        </p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" onclick="window.dispatchEvent(new Event('submit'))" data-bs-dismiss="modal">X</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                <div class="row">
                    <!-- Left Column - Plate Info -->
                    <div class="col-md-5 border-end">
                        <div class="text-center mb-4">
                            @if(isset($scanResult['image_path']) || isset($scanResult['image_url']))
                                <img src="{{ asset($scanResult['image_path'] ?? $scanResult['image_url'] ?? '') }}" 
                                    alt="Plate image"
                                    class="img-fluid rounded shadow" 
                                    style="max-height: 180px;">
                            @endif

                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <span class="badge bg-success px-3 py-2 rounded-pill">
                                    <i class="fa fa-tag me-1"></i> {{ strtoupper($scanResult['plate'] ?? '') }}
                                </span>
                                <span class="badge bg-info px-3 py-2 rounded-pill">
                                    <i class="fa fa-percentage me-1"></i> {{ round(($scanResult['score'] ?? 0) * 100) }}%
                                </span>
                            </div>
                            
                            @if($scanResult['existing_record'] ?? false)
                                <div class="alert alert-success mt-3 py-2 px-3 small">
                                    <i class="fa fa-history me-1"></i>
                                    This vehicle has visited <strong>{{ $scanResult['visit_count'] ?? 0 }} time(s)</strong>
                                </div>
                            @else
                                <div class="alert alert-primary mt-3 py-2 px-3 small">
                                    <i class="fa fa-info-circle me-1"></i>
                                    First time detection of this vehicle
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Right Column - Owner Info -->
                    <div class="col-md-7">
                        @if(($scanResult['existing_record'] ?? false) && isset($scanResult['owner']))
                            <div class="d-flex align-items-start mb-4">
                                {{-- <img src="{{ asset('storage/' . ($scanResult['owner']['photo'] ?? 'user.png')) }}" --}}
                                <img src="{{ asset('admin/vendors/images/team.png') }}"
                                     alt="Owner Photo"
                                     class="rounded-circle border shadow-sm me-3"
                                     style="width: 80px; height: 80px; object-fit: cover;">
                                
                                <div>
                                    <h4 class="fw-bold mb-1">{{ $scanResult['owner']['name'] }}</h4>
                                    <div class="d-flex flex-wrap gap-1 mb-2">
                                        {{-- <span class="badge bg-secondary bg-opacity-10 rounded-pill px-3 py-1 small">
                                            <i class="fa fa-{{ $scanResult['owner']['gender'] == 'male' ? 'mars' : 'venus' }} me-1"></i>
                                            {{ $scanResult['owner']['gender'] ?? 'N/A' }}
                                        </span> --}}
                                        @if($scanResult['owner']['department'] ?? false)
                                            <span class="badge bg-info bg-opacity-10 rounded-pill px-3 py-1 small">
                                                <i class="fa fa-building me-1"></i>
                                                {{ $scanResult['owner']['department'] }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Owner Details Grid -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="fw-bold small text-muted mb-2">CONTACT INFO</h6>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <i class="fa fa-phone text-primary me-2"></i>
                                                {{ $scanResult['owner']['phone'] }}
                                            </li>
                                            @if($scanResult['owner']['email'] ?? false)
                                                <li class="mb-2">
                                                    <i class="fa fa-envelope text-primary me-2"></i>
                                                    {{ $scanResult['owner']['email'] }}
                                                </li>
                                            @endif
                                            @if($scanResult['owner']['address'] ?? false)
                                                <li>
                                                    <i class="fa fa-building text-primary me-2"></i>
                                                    {{ $scanResult['owner']['address'] }}
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="bg-light p-3 rounded">
                                        <h6 class="fw-bold small text-muted mb-2">OTHER DETAILS</h6>
                                        <ul class="list-unstyled mb-0">
                                            @if($scanResult['owner']['state_of_origin'] ?? false)
                                                <li class="mb-2">
                                                    <i class="fa fa-flag text-primary me-2"></i>
                                                    {{ $scanResult['owner']['state_of_origin'] }}
                                                </li>
                                            @endif
                                            <li>
                                                <i class="fa fa-calendar-alt text-primary me-2"></i>
                                                Registered: {{ $scanResult['owner']['created_at']->format('M j, Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-success" onclick="window.dispatchEvent(new Event('submit'))" data-bs-dismiss="modal">
                    <i class="fa fa-check-circle me-1"></i> Grant Access
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('submit', event => {
        document.getElementById("successModal").click();
    })
</script>