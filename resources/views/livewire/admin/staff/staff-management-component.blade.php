<div>
    <div class="page-header mb-4 d-flex justify-content-between align-items-center flex-wrap">
        <h4>Staff Management</h4>
        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addStaffModal">
            <i class="fa fa-user-plus mr-1"></i> Add New Staff
        </button>
    </div>

    <div class="card-box pd-20 d-flex justify-content-between flex-wrap gap-3 mb-4">
        <div class="flex-fill">
            <input type="text"
                   class="form-control"
                   placeholder="Search by name, service number, unit..."
                   wire:model.live="search">
        </div>
        {{-- <div>
            <button wire:click="exportPDF" class="btn btn-outline-danger btn-sm mr-2">Export PDF</button>
            <button wire:click="exportExcel" class="btn btn-outline-success btn-sm">Export Excel</button>
        </div> --}}
    </div>

    <div class="card-box mb-30">
        <div class="table-responsive">
            <table class="table table-striped table-bordered mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Staff Name</th>
                        <th>Service No.</th>
                        <th>Unit</th>
                        <th>Email</th>
                        <th>Rank</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</td>
                            <td>{{ $user->service_number }}</td>
                            <td>{{ $user->unit }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rank }}</td>
                            <td>
                                <span class="badge badge-{{ $user->status === 'Active' ? 'success' : 'secondary' }}">
                                    {{ $user->status }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('user.show',$user->id) }}" class="dropdown-item"><i class="dw dw-eye"></i> View</a>
                                        <a href="{{ route('user.edit',$user->id) }}" class="dropdown-item text-primary"><i class="dw dw-edit2"></i> Edit</a>
                                        @if($user->status==='Active')
                                            <a class="dropdown-item text-danger" wire:click="deactivate({{ $user->id }})"><i class="fa fa-times"></i> Deactivate</a>
                                        @elseif($user->status==='Inactive')
                                            <a class="dropdown-item text-success" wire:click="activate({{ $user->id }})"><i class="fa fa-check-circle"></i> Activate</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                No matching staff found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $users->links() }}
        </div>
    </div>

    @include('livewire.admin.staff.modals.add-staff')
    {{-- @include('livewire.admin.staff.modals.edit-staff')
    @include('livewire.admin.staff.modals.view-staff') --}}
</div>
