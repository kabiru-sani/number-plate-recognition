<div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true" wire:ignore.self>
    <style>
        /* Add to your stylesheet */
        #registrationModal .form-control:focus,
        #registrationModal .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
            border-color: #3b82f6;
        }

        #registrationModal .input-group:focus-within {
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
            border-radius: 0.375rem;
        }

        #registrationModal .btn-outline-secondary:hover {
            background-color: #76b3f0;
        }

        #registrationModal .btn-primary {
            transition: all 0.3s ease;
        }

        #registrationModal .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 overflow-hidden">
            <!-- Modal Header with Gradient Background -->
            <div class="modal-header text-white py-4" style="background: linear-gradient(135deg, #198754 0%, #0d6e3d 100%);">
                <div class="d-flex align-items-center">
                    <div class="bg-white bg-opacity-25 rounded-circle p-2 me-3">
                        <i class="fa fa-car fa-lg"></i>
                    </div>
                    <div>
                        <h5 class="modal-title mb-0" id="registrationModalLabel">
                            New Vehicle Plate Information
                        </h5>
                        <p class="small mb-0 opacity-85">Plate: <strong>{{ strtoupper($plateToRegister) }}</strong></p>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" onclick="window.dispatchEvent(new Event('submit'))" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-0">
                <div class="row g-0">
                    <!-- Left Side - Visual Elements -->
                    <div class="col-md-4 d-none d-md-flex bg-light position-relative">
                        <div class="p-4 w-100">
                            <div class="text-center mb-4">
                                <img src="{{ asset('admin/vendors/images/nda-logo.png') }}" alt="Vehicle Registration" class="img-fluid" style="max-height: 180px;">
                            </div>
                            <div class="alert alert-success border-success bg-success text-white bg-opacity-10 small mb-0 text-start">
                                <i class="fa fa-info-circle me-2"></i>
                                Complete all fields to register this vehicle's owner information
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Form Elements -->
                    <div class="col-md-8">
                        <div class="p-4">
                            <h6 class="fw-bold text-muted mb-4 border-bottom pb-2">
                                <i class="fa fa-user-circle me-2"></i> Owner Details
                            </h6>

                            <div class="row g-3">
                                <!-- Name Field -->
                                <div class="col-12">
                                    <label class="form-label fw-medium">Full Name <span class="text-danger">*</span></label>
                                    <div class="input-group border rounded">
                                        <span class="input-group-text bg-white border-0">
                                            <i class="fa fa-user text-primary"></i>
                                        </span>
                                        <input type="text" class="form-control border-0 shadow-none" 
                                               wire:model="ownerDetails.name" 
                                               placeholder="Gen. T.A Emanuel">
                                    </div>
                                    @error('ownerDetails.name') 
                                        <div class="text-danger small mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Email Field -->
                                <div class="col-md-6">
                                    <label class="form-label fw-medium">Email</label>
                                    <div class="input-group border rounded">
                                        <span class="input-group-text bg-white border-0">
                                            <i class="fa fa-envelope text-primary"></i>
                                        </span>
                                        <input type="email" class="form-control border-0 shadow-none" 
                                               wire:model="ownerDetails.email" 
                                               placeholder="emma@nda.com">
                                    </div>
                                    @error('ownerDetails.email') 
                                        <div class="text-danger small mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Phone Field -->
                                <div class="col-md-6">
                                    <label class="form-label fw-medium">Phone <span class="text-danger">*</span></label>
                                    <div class="input-group border rounded">
                                        <span class="input-group-text bg-white border-0">
                                            <i class="fa fa-phone text-primary"></i>
                                        </span>
                                        <input type="tel" class="form-control border-0 shadow-none" 
                                               wire:model="ownerDetails.phone" 
                                               placeholder="08012345678">
                                    </div>
                                    @error('ownerDetails.phone') 
                                        <div class="text-danger small mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Department Field -->
                                <div class="col-md-12">
                                    <label class="form-label fw-medium">Department</label>
                                    <input type="text" class="form-control border" 
                                           wire:model="ownerDetails.department" 
                                           placeholder="Enter department name">
                                    @error('ownerDetails.department') 
                                        <div class="text-danger small mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Address Field -->
                                <div class="col-md-12">
                                    <label class="form-label fw-medium">Address</label>
                                    <input type="text" class="form-control border" 
                                              wire:model="ownerDetails.address" 
                                              placeholder="Enter full address">
                                    @error('ownerDetails.address') 
                                        <div class="text-danger small mt-1">
                                            <i class="fa fa-exclamation-circle me-1"></i> {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-light d-flex justify-content-between border-top">
                <button type="button" class="btn btn-outline-secondary" onclick="window.dispatchEvent(new Event('submit'))" data-bs-dismiss="modal">
                    <i class="fa fa-times me-2"></i> Close
                </button>

                <button type="button" class="btn btn-success" wire:click="registerPlate">
                    <i class="fa fa-save me-2"></i> Register Vehicle
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('submit', event => {
        document.getElementById("registrationModal").click();
    })
</script>

<script>
    window.addEventListener('feedback', event => {
        document.getElementById("registrationModal").click();
    })
</script>

