<div>
    <div class="min-height-200px">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Manage Staff Applications</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Applications</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <input type="text" class="form-control" id="applicationSearch" placeholder="Search by name or ID..." style="max-width: 300px; display: inline-block;" onkeyup="filterApplications()">
            </div>
        </div>
    </div>
    
    <!-- Applications Table -->
    <div class="card-box mb-30">
        <div class="pd-20 d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div class="pd-20">
            <h4 class="text-blue h4">All Applications</h4>
            <p>Review, approve, or reject pending applications.</p>
        </div>
        <div>
            <a href="{{ route('admin.application.create') }}" class="btn btn-outline-success btn-sm"><i class="fa fa-plus"></i> New Application</a>
        </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="applicationTable">
                <thead class="thead-light">
                    <tr>
                        <th>Application ID</th>
                        <th>Staff Name</th>
                        <th>Location</th>
                        <th>Plot Size</th>
                        <th>Status</th>
                        <th>Date Submitted</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>APP-00123</td>
                        <td>Kabiru Sani</td>
                        <td>Abuja Extension</td>
                        <td>2 Plots</td>
                        <td><span class="badge badge-warning">Pending</span></td>
                        <td>2025-07-10</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('admin.application.show',1) }}"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item text-success" href="#"><i class="dw dw-edit2"></i> Approve</a>
                                    <a class="dropdown-item text-danger" href="#"><i class="dw dw-delete-3"></i> Reject</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>APP-00124</td>
                        <td>Aisha Bello</td>
                        <td>Kaduna Phase 1</td>
                        <td>1 Plot</td>
                        <td><span class="badge badge-success">Approved</span></td>
                        <td>2025-07-08</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('admin.application.show',1) }}"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item text-success" href="#"><i class="dw dw-edit2"></i> Approve</a>
                                    <a class="dropdown-item text-danger" href="#"><i class="dw dw-delete-3"></i> Reject</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>APP-00125</td>
                        <td>Emeka Okafor</td>
                        <td>Lagos Zone 3</td>
                        <td>3 Plots</td>
                        <td><span class="badge badge-danger">Rejected</span></td>
                        <td>2025-07-05</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('admin.application.show',1) }}"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item text-success" href="#"><i class="dw dw-edit2"></i> Approve</a>
                                    <a class="dropdown-item text-danger" href="#"><i class="dw dw-delete-3"></i> Reject</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>APP-00126</td>
                        <td>Grace Adeyemi</td>
                        <td>Port Harcourt South</td>
                        <td>2 Plots</td>
                        <td><span class="badge badge-warning">Pending</span></td>
                        <td>2025-07-12</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('admin.application.show',1) }}"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item text-success" href="#"><i class="dw dw-edit2"></i> Approve</a>
                                    <a class="dropdown-item text-danger" href="#"><i class="dw dw-delete-3"></i> Reject</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>APP-00127</td>
                        <td>Usman Danjuma</td>
                        <td>Enugu North</td>
                        <td>1 Plot</td>
                        <td><span class="badge badge-success">Approved</span></td>
                        <td>2025-07-03</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('admin.application.show',1) }}"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item text-success" href="#"><i class="dw dw-edit2"></i> Approve</a>
                                    <a class="dropdown-item text-danger" href="#"><i class="dw dw-delete-3"></i> Reject</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
