<div>
    <div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-success ">
            <h4 class="mb-0 text-white">Edit Staff Record</h4>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="updateStaff" class="row g-3">
                <!-- Personal Information -->
                <div class="col-md-12 mb-3">
                    <h6 class="border-bottom pb-2">Personal Information</h6>
                </div>
                
                <div class="form-group col-md-4">
                    <label>First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" wire:model.defer="firstname">
                    @error('firstname') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group col-md-4">
                    <label>Middle Name</label>
                    <input type="text" class="form-control" wire:model.defer="middlename">
                    @error('middlename') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group col-md-4">
                    <label>Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" wire:model.defer="lastname">
                    @error('lastname') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                
                <!-- Military Information -->
                <div class="col-md-12 mb-3 mt-3">
                    <h6 class="border-bottom pb-2">Military Information</h6>
                </div>
                
                <div class="form-group col-md-6">
                    <label>Service Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" wire:model.defer="service_number">
                    @error('service_number') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group col-md-6">
                    <label>Rank <span class="text-danger">*</span></label>
                    <select class="form-control" wire:model.live="rank">
                        <option value="" disabled>Select Rank</option>
                        <option value="Admiral">Admiral</option>
                        <option value="Vice Admiral">Vice Admiral</option>
                        <option value="Rear Admiral">Rear Admiral</option>
                        <option value="Commodore">Commodore</option>
                        <option value="Captain">Captain</option>
                        <option value="Commander">Commander</option>
                        <option value="Lieutenant Commander">Lieutenant Commander</option>
                        <option value="Lieutenant">Lieutenant</option>
                        <option value="Sub-Lieutenant">Sub-Lieutenant</option>
                        <option value="Acting Sub-Lieutenant">Acting Sub-Lieutenant</option>
                        <option value="Warrant Chief Petty Officer">Warrant Chief Petty Officer</option>
                        <option value="Chief Petty Officer">Chief Petty Officer</option>
                        <option value="Petty Officer">Petty Officer</option>
                        <option value="Leading Seaman">Leading Seaman</option>
                        <option value="Able Seaman">Able Seaman</option>
                        <option value="Ordinary Seaman">Ordinary Seaman</option>

                        <option value="Air Chief Marshal">Air Chief Marshal</option>
                        <option value="Air Marshal">Air Marshal</option>
                        <option value="Air Vice Marshal">Air Vice Marshal</option>
                        <option value="Air Commodore">Air Commodore</option>
                        <option value="Group Captain">Group Captain</option>
                        <option value="Wing Commander">Wing Commander</option>
                        <option value="Squadron Leader">Squadron Leader</option>
                        <option value="Flight Lieutenant">Flight Lieutenant</option>
                        <option value="Flying Officer">Flying Officer</option>
                        <option value="Pilot Officer">Pilot Officer</option>
                        <option value="Air Warrant Officer">Air Warrant Officer</option>
                        <option value="Master Warrant Officer">Master Warrant Officer</option>
                        <option value="Warrant Officer">Warrant Officer</option>
                        <option value="Flight Sergeant">Flight Sergeant</option>
                        <option value="Sergeant">Sergeant</option>
                        <option value="Corporal">Corporal</option>
                        <option value="Lance Corporal">Lance Corporal</option>
                        <option value="Aircraftman/Aircraftwoman">Aircraftman/Aircraftwoman</option>
                        <option value="General">General</option>
                        <option value="Lieutenant General">Lieutenant General</option>
                        <option value="Major General">Major General</option>
                        <option value="Brigadier General">Brigadier General</option>
                        <option value="Colonel">Colonel</option>
                        <option value="Lieutenant Colonel">Lieutenant Colonel</option>
                        <option value="Major">Major</option>
                        <option value="Captain">Captain</option>
                        <option value="Lieutenant">Lieutenant</option>
                        <option value="Second Lieutenant">Second Lieutenant</option>
                        <option value="Master Warrant Officer">Master Warrant Officer</option>
                        <option value="Warrant Officer">Warrant Officer</option>
                        <option value="Staff Sergeant">Staff Sergeant</option>
                        <option value="Sergeant">Sergeant</option>
                        <option value="Corporal">Corporal</option>
                        <option value="Lance Corporal">Lance Corporal</option>
                        <option value="Private">Private</option>
                    </select>
                    @error('rank') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group col-md-6">
                    <label>Unit/Formation <span class="text-danger">*</span></label>
                    <select class="form-control" wire:model.live="unit">
                        <option value="" disabled>Select Unit</option>
                        <option value="1 Division">1 Division</option>
                        <option value="2 Division">2 Division</option>
                        <option value="3 Division">3 Division</option>
                        <option value="81 Division">81 Division</option>
                        <option value="82 Division">82 Division</option>
                        <option value="Army Headquarters">Army Headquarters</option>
                        <option value="Nigerian Army Armoured Corps">Armoured Corps</option>
                        <option value="Nigerian Army Artillery Corps">Artillery Corps</option>
                        <option value="Nigerian Army Engineers">Engineers</option>
                        <option value="Nigerian Army Signals">Signals</option>
                        <option value="Nigerian Army Medical Corps">Medical Corps</option>
                        <option value="Nigerian Defence Academy">Nigerian Defence Academy</option>
                    </select>
                    @error('unit') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group col-md-6">
                    <label>Role <span class="text-danger">*</span></label>
                    <select class="form-control" wire:model.live="role">
                        <option value="personnel">Personnel</option>
                        <option value="officer">Officer</option>
                        <option value="admin">Administrator</option>
                    </select>
                    @error('role') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                
                <!-- Contact Information -->
                <div class="col-md-12 mb-3 mt-3">
                    <h6 class="border-bottom pb-2">Contact Information</h6>
                </div>
                
                <div class="form-group col-md-6">
                    <label>Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" wire:model.defer="email">
                    @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group col-md-6">
                    <label>Phone Number <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" wire:model.defer="phone">
                    @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                
                <!-- Status Field -->
                <div class="form-group col-md-6">
                    <label>Status <span class="text-danger">*</span></label>
                    <select class="form-control" wire:model.defer="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                    @error('status') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                
                <!-- Profile Photo -->
                <div class="form-group col-md-6">
                    <label>Profile Photo</label>
                    <input type="file" class="form-control" wire:model="profile_photo_path">
                    @error('profile_photo_path') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                
                <!-- Password Section -->
                <div class="col-md-12 mb-3 mt-3">
                    <h6 class="border-bottom pb-2">Password Update</h6>
                </div>
                
                <div class="form-group col-md-6">
                    <label>New Password (optional)</label>
                    <input type="password" class="form-control" wire:model.defer="password">
                    @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" wire:model.defer="password_confirmation">
                </div>
                
                <!-- Form Actions -->
                <div class="col-12 text-end mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save me-1"></i> Update Staff
                    </button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
