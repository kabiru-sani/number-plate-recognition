@section('password')
class="active"
@endsection
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block">
                <div class="card card-bordered">
                    <div class="card-aside-wrap">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Change Password</h4>
                                    </div>
                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </div>
                                </div><br><hr>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="nk-data data-list">
                                <form action="#" wire:submit.prevent="changePassword">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Old Password:</label>
                                        <div class="form-control-wrap">
                                            <input wire:model="current_passowrd" type="password" class="form-control">
                                            @error('current_passowrd')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">New Password:</label>
                                        <div class="form-control-wrap">
                                            <input wire:model="password" type="password" class="form-control">
                                            @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Confirm Password:</label>
                                        <div class="form-control-wrap">
                                            <input wire:model="password_confirmation" type="password" class="form-control">
                                            @error('password_confirmation')<p class="text-danger">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div style="margin-left: 50%" wire:loading wire:target="changePassword" ><x-action-loader /></div>
                                    <div class="form-group">
                                        <button type="submit"   class="btn btn-lg btn-secondary">Change Password</button>
                                    </div>
                                </form>
                                </div>
                            </div><!-- .nk-block -->
                        </div>
                        <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg toggle-screen-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="card-inner-group" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                                <div class="card-inner">
                                    <div class="user-card">
                                        <div class="user-avatar bg-primary">
                                            <img src="{{ asset('admin-assets/photo/'.Auth::user()->profile_photo_path) }}" width="50" />
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text">{{ Auth::user()->surname.' '.Auth::user()->othernames}}</span>
                                            <span class="sub-text">{{ Auth::user()->role }}</span>
                                        </div>
                                        <div class="user-action">
                                            <div class="dropdown">
                                                <a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .user-card -->
                                </div><!-- .card-inner -->
                                
                            </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 503px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 400px; display: block; transform: translate3d(0px, 0px, 0px);"></div></div></div><!-- .card-inner-group -->
                        </div><!-- card-aside -->
                    </div><!-- .card-aside-wrap -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
