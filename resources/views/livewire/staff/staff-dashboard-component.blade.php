<div>
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="{{ asset('admin/vendors/images/dash-img.png') }}" alt="">
            </div>
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    Welcome back <div class="weight-600 font-30 text-blue">Kabiru Sani!</div>
                </h4>
                <p class="font-18 max-width-600">Track your land application, wallet deductions, and allocation history here.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data"><div id="chart"></div></div>
                    <div class="widget-data">
                        <div class="h4 mb-0">₦150,000</div>
                        <div class="weight-600 font-14">Wallet Balance</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data"><div id="chart2"></div></div>
                    <div class="widget-data">
                        <div class="h4 mb-0">2 Plots</div>
                        <div class="weight-600 font-14">Allocated Land</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data"><div id="chart3"></div></div>
                    <div class="widget-data">
                        <div class="h4 mb-0">₦20,000</div>
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
                        <div class="h4 mb-0">₦10,000</div>
                        <div class="weight-600 font-14">This Month's Deduction</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">Wallet Deduction History</h2>
                <div id="deductionHistoryChart"></div>
            </div>
        </div>
        <div class="col-xl-4 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">Application Status</h2>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Application Submitted
                        <span class="badge badge-primary">✔</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Land Allocated
                        <span class="badge badge-success">✔</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Wallet Active
                        <span class="badge badge-info">✔</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
