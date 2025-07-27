<div>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <!-- Profile Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success ">
                        <h5 class="mb-0 text-white">Profile Photo</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="position-relative d-inline-block">
                            <img src="{{ asset('admin/vendors/images/team.png') }}" 
                                class="rounded-circle border" 
                                width="200" height="200"
                                alt="Profile Photo">
                            <span class="bottom-0 end-0 bg-success text-white px-2 py-1 rounded">
                                {{ $user->rank }}
                            </span>
                        </div>
                        <h4 class="mt-3">{{ $user->firstname }} {{ $user->lastname }}</h4>
                        <p class="text-muted">{{ $user->service_number }}</p>
                    </div>
                </div>

                <!-- Military Information Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success ">
                        <h5 class="mb-0 text-white">Military Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6 class="text-muted small">Service Number</h6>
                            <p>{{ $user->service_number }}</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-muted small">Rank</h6>
                            <p>{{ $user->rank }}</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-muted small">Unit/Formation</h6>
                            <p>{{ $user->unit }}</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-muted small">Role</h6>
                            <p class="text-capitalize">{{ $user->role }}</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-muted small">Status</h6>
                            <span class="badge bg-{{ $user->status == 'Active' ? 'success' : 'danger' }}">
                                {{ $user->status }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Personal Information Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success  d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-white">Personal Information</h5>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-light">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted small">First Name</h6>
                                <p>{{ $user->firstname }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted small">Middle Name</h6>
                                <p>{{ $user->middlename ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted small">Last Name</h6>
                                <p>{{ $user->lastname }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted small">Date of Birth</h6>
                                <p>{{ $user->date_of_birth ? $user->date_of_birth->format('M d, Y') : 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success ">
                        <h5 class="mb-0 text-white">Contact Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted small">Email Address</h6>
                                <p>{{ $user->email }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted small">Phone Number</h6>
                                <p>{{ $user->phone }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted small">State of Origin</h6>
                                <p>{{ $user->state_of_origin ?? 'N/A' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted small">LGA of Origin</h6>
                                <p>{{ $user->lga_of_origin ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Information Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success ">
                        <h5 class="mb-0 text-white">Account Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted small">Account Created</h6>
                                <p>{{ $user->created_at->format('M d, Y') }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted small">Last Updated</h6>
                                <p>{{ $user->updated_at->format('M d, Y') }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted small">Email Verified</h6>
                                <p>
                                    @if($user->email_verified_at)
                                        <span class="badge bg-success">Verified</span>
                                    @else
                                        <span class="badge bg-warning">Pending</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Promotions History -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success ">
                        <h5 class="mb-0 text-white">Promotions History</h5>
                    </div>
                    <div class="card-body">
                        @if($user->promotions && $user->promotions->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>From Rank</th>
                                            <th>To Rank</th>
                                            <th>Authority</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user->promotions as $promotion)
                                        <tr>
                                            <td>{{ $promotion->promotion_date->format('M d, Y') }}</td>
                                            <td>{{ $promotion->previous_rank }}</td>
                                            <td>{{ $promotion->new_rank }}</td>
                                            <td>{{ $promotion->authority }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                No promotion records found
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Postings History -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success ">
                        <h5 class="mb-0 text-white">Postings History</h5>
                    </div>
                    <div class="card-body">
                        @if($user->postings && $user->postings->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Date Posted</th>
                                            <th>Unit</th>
                                            <th>Appointment</th>
                                            <th>Date Relieved</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user->postings as $posting)
                                        <tr>
                                            <td>{{ $posting->date_posted->format('M d, Y') }}</td>
                                            <td>{{ $posting->unit }}</td>
                                            <td>{{ $posting->appointment }}</td>
                                            <td>{{ $posting->date_relieved ? $posting->date_relieved->format('M d, Y') : 'Current' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                No posting records found
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
