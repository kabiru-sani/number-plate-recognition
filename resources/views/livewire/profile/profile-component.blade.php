<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Profile</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
            <div class="pd-20 card-box height-100-p">
                <div class="profile-photo">
                    <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                    <img src="{{ Auth::user()->profile_photo_path ? asset('storage/'.Auth::user()->profile_photo_path) : asset('admin/vendors/images/team.png') }}" alt="" class="avatar-photo">
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body pd-5">
                                    <div class="img-container">
                                        {{-- <img id="image" src="{{ Auth::user()->profile_photo_path ? asset('storage/'.Auth::user()->profile_photo_path) : asset('admin/vendors/images/team.png') }}" alt="Picture"> --}}
                                        <img id="image" src="{{ asset('admin/vendors/images/team.png') }}" alt="Picture">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="text-center h5 mb-0">{{ Auth::user()->rank }} {{ Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname }}</h5>
                <p class="text-center text-muted font-14">{{ ucfirst(Auth::user()->role) }} | {{ Auth::user()->unit }}</p>
                <p class="text-center text-muted font-14">Service No: {{ Auth::user()->service_number }}</p>
                <div class="profile-info">
                    <h5 class="mb-20 h5 text-blue">Personal Information</h5>
                    <ul>
                        <li>
                            <span>Status:</span>
                            <span class="badge badge-{{ Auth::user()->status == 'Active' ? 'success' : 'danger' }}">
                                {{ Auth::user()->status }}
                            </span>
                        </li>
                        <li>
                            <span>Email:</span>
                            {{ Auth::user()->email }}
                            @if(Auth::user()->email_verified_at)
                                <i class="fa fa-check-circle text-success" title="Verified"></i>
                            @else
                                <i class="fa fa-exclamation-circle text-warning" title="Not Verified"></i>
                            @endif
                        </li>
                        <li>
                            <span>Phone:</span>
                            {{ Auth::user()->phone }}
                        </li>
                        <li>
                            <span>Unit:</span>
                            {{ Auth::user()->unit }}
                        </li>
                        <li>
                            <span>Rank:</span>
                            {{ Auth::user()->rank }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
            <div class="card-box height-100-p overflow-hidden">
                <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#password" role="tab">Change Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- Personal Info Tab -->
                            <div class="tab-pane fade show active height-100-p" id="personal" role="tabpanel">
                                <div class="profile-setting">
                                    <form method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <ul class="profile-edit-list row">
                                            <li class="weight-500 col-md-6">
                                                <h4 class="text-blue h5 mb-20">Personal Information</h4>
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input class="form-control form-control-lg" type="text" name="firstname" value="{{ Auth::user()->firstname }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Middle Name</label>
                                                    <input class="form-control form-control-lg" type="text" name="middlename" value="{{ Auth::user()->middlename }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input class="form-control form-control-lg" type="text" name="lastname" value="{{ Auth::user()->lastname }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control form-control-lg" type="email" name="email" value="{{ Auth::user()->email }}" disabled>
                                                </div>
                                                
                                                
                                            </li>
                                            <li class="weight-500 col-md-6">
                                                <h4 class="text-blue h5 mb-20">Service Information</h4>
                                                <div class="form-group">
                                                    <label>Service Number</label>
                                                    <input class="form-control form-control-lg" type="text" value="{{ Auth::user()->service_number }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input class="form-control form-control-lg" type="text" name="phone" value="{{ Auth::user()->phone }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Unit</label>
                                                    <input class="form-control form-control-lg" type="text" name="unit" value="{{ Auth::user()->unit }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Rank</label>
                                                    <input class="form-control form-control-lg" type="text" name="rank" value="{{ Auth::user()->rank }}" disabled>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label>Profile Photo</label>
                                                    <input type="file" class="form-control-file" name="profile_photo">
                                                </div> --}}
                                                {{-- <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control form-control-lg" name="status">
                                                        <option value="Active" {{ Auth::user()->status == 'Active' ? 'selected' : '' }}>Active</option>
                                                        <option value="Inactive" {{ Auth::user()->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                </div> --}}
                                            </li>
                                        </ul>
                                        {{-- <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary">Update Profile</button>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Password Change Tab -->
                            <div class="tab-pane fade height-100-p" id="password" role="tabpanel">
                                <div class="profile-setting p-3">
                                     <form action="#" wire:submit.prevent="changePassword">
                                        @csrf
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input wire:model="current_passowrd" type="password" class="form-control">
                                            @error('current_passowrd')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input wire:model="password" type="password" class="form-control">
                                            @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm New Password</label>
                                            <input wire:model="password_confirmation" type="password" class="form-control">
                                            @error('password_confirmation')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                        <div class="form-group text-center">
                                            
                                            <button type="submit" class="btn btn-primary">Change Password
                                                <div wire:loading wire:target="changePassword" ><x-action-loader /></div>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
