<div>
    <!-- Welcome Header -->
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="{{ asset('admin/vendors/images/dash-img.png') }}" alt="">
            </div>
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    Welcome to ANPR Dashboard <div class="weight-600 font-30 text-blue">{{ Auth::user()->name }}!</div>
                </h4>
                <p class="font-18 max-width-600">Use the navigation to upload and scan vehicle number plates.</p>
            </div>
        </div>
    </div>

    <!-- Dashboard Widgets -->
    <div class="row">
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data"><div id="chart"></div></div>
                    <div class="widget-data">
                        <div class="h4 mb-0">128</div>
                        <div class="weight-600 font-14">Total Applications</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data"><div id="chart2"></div></div>
                    <div class="widget-data">
                        <div class="h4 mb-0">64</div>
                        <div class="weight-600 font-14">Land Allocated</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data"><div id="chart3"></div></div>
                    <div class="widget-data">
                        <div class="h4 mb-0">₦2,000,000</div>
                        <div class="weight-600 font-14">Monthly Target</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data"><div id="chart4"></div></div>
                    <div class="widget-data">
                        <div class="h4 mb-0">₦1,320,000</div>
                        <div class="weight-600 font-14">Collected This Month</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row">
        <div class="col-xl-8 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">Wallet Deduction Trend</h2>
                <div id="chart5"></div>
            </div>
        </div>
        <div class="col-xl-4 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">Monthly Allocation Stats</h2>
                <div id="chart6"></div>
            </div>
        </div>
    </div>

    <!-- Applications Table -->
    <div class="card-box mb-30">
        <h2 class="h4 pd-20">Recent Staff Applications</h2>
        <div class="table-responsive">
            <table class="table table-bordered nowrap">
                <thead class="thead-light">
                    <tr>
                        <th>Application ID</th>
                        <th>Staff Name</th>
                        <th>Land Size</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Submitted On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>APP-00123</td>
                        <td>Kabiru Sani</td>
                        <td>2 Plots</td>
                        <td>Kaduna Phase 2</td>
                        <td><span class="badge badge-warning">Pending</span></td>
                        <td>2025-07-10</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Approve</a>
                                    <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Reject</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- More rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>
