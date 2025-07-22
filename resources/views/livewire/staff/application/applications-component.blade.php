<div>
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>My Land Applications</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Applications</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <!--Search Field -->
                    <input type="text" class="form-control" id="applicationSearch" placeholder="Search Applications..." onkeyup="searchTable()" style="max-width: 300px; display: inline-block;">
                </div>
            </div>
        </div>

        <!-- Applications Table -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">Land Allocation History</h4>
                <p class="mb-0">View your submitted applications and their statuses.</p>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="applicationTable" style="width: 100%; table-layout: fixed;">
                    <thead class="thead-light">
                        <tr>
                            <th>Application ID</th>
                            <th>Land Size</th>
                            <th>Location</th>
                            <th>Submitted On</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>APP-00123</td>
                            <td>2 Plots</td>
                            <td>Kaduna Phase 2</td>
                            <td>2025-07-05</td>
                            <td><span class="badge badge-success">Approved</span></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 dropdown-toggle" href="#" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('allocation.detail',1) }}"><i class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>APP-00124</td>
                            <td>1 Plot</td>
                            <td>Abuja Extension</td>
                            <td>2025-07-12</td>
                            <td><span class="badge badge-warning">Pending</span></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 dropdown-toggle" href="#" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('allocation.detail',1) }}"><i class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>APP-00125</td>
                            <td>1 Plot</td>
                            <td>Kaduna Road</td>
                            <td>2025-07-12</td>
                            <td><span class="badge badge-danger">Rejected</span></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 dropdown-toggle" href="#" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('allocation.detail',1) }}"><i class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                        <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Table Filter Script -->
<script>
    function searchTable() {
        const input = document.getElementById("applicationSearch");
        const filter = input.value.toLowerCase();
        const table = document.getElementById("applicationTable");
        const rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            let visible = false;
            const cols = rows[i].getElementsByTagName("td");
            for (let j = 0; j < cols.length; j++) {
                if (cols[j].textContent.toLowerCase().includes(filter)) {
                    visible = true;
                    break;
                }
            }
            rows[i].style.display = visible ? "" : "none";
        }
    }
</script>
