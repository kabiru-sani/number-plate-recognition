<!-- Add Staff Modal -->
<div class="modal fade" id="addStaffModal" tabindex="-1" role="dialog" aria-labelledby="addStaffModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form class="modal-content" wire:submit.prevent="addStaff">
      <div class="modal-header bg-success">
        <h5 class="modal-title text-white" id="addStaffModalLabel">Register New Army Personnel</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row">
        <!-- Personal Information -->
        <div class="col-md-12 mb-3">
          <h6 class="border-bottom pb-2">Personal Information</h6>
        </div>

        <div class="form-group col-md-4">
          <label>First Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" wire:model="firstname">
          @error('firstname') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="form-group col-md-4">
          <label>Middle Name</label>
          <input type="text" class="form-control" wire:model="middlename">
        </div>

        <div class="form-group col-md-4">
          <label>Last Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" wire:model="lastname">
          @error('lastname') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <!-- Military Information -->
        <div class="col-md-12 mb-3 mt-3">
          <h6 class="border-bottom pb-2">Military Information</h6>
        </div>

        <div class="form-group col-md-6">
          <label>Service Number <span class="text-danger">*</span></label>
          <input type="text" class="form-control" wire:model="service_number">
          @error('service_number') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="form-group col-md-6">
          <label>Rank <span class="text-danger">*</span></label>
          <select class="form-control" wire:model="rank">
            <option value="">Select Rank</option>
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
          <select class="form-control" wire:model="unit">
            <option value="">Select Unit</option>
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
          </select>
          @error('unit') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="form-group col-md-6">
          <label>Role <span class="text-danger">*</span></label>
          <select class="form-control" wire:model="role">
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
          <input type="email" class="form-control" wire:model="email">
          @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="form-group col-md-6">
          <label>Phone Number <span class="text-danger">*</span></label>
          <input type="tel" class="form-control" wire:model="phone">
          @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <!-- Account Information -->
        <div class="col-md-12 mb-3 mt-3">
          <h6 class="border-bottom pb-2">Account Information</h6>
        </div>

        <div class="form-group col-md-12">
          <label>Profile Photo</label>
          <input type="file" class="form-control" wire:model="profile_photo_path">
          @error('profile_photo_path') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">
          {{-- <span wire:loading wire:target="addStaff" class="spinner-border spinner-border-sm" role="status"
            aria-hidden="true"></span> --}}
          Register Personnel
        </button>
      </div>
    </form>
  </div>
</div>