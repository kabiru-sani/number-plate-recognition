<div>
    <div class="min-height-200px">
        <div class="page-header">
            <div class="title">
                <h4>Set Monthly Deduction Targets</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Monthly Targets</li>
                </ol>
            </nav>
        </div>

        <div class="card-box pd-20 mb-30">
            <form action="#" method="POST">
                {{-- @csrf --}}

                <div class="row">
                    <!-- Select Staff -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Staff:</label>
                            <select class="form-control" name="staff_id" required>
                                <option value="">-- Choose Staff --</option>
                                <option value="1">Kabiru Sani (APP-00123)</option>
                                <option value="2">Aisha Bello (APP-00124)</option>
                                <option value="3">Emeka Okafor (APP-00125)</option>
                                <option value="4">Grace Adeyemi (APP-00126)</option>
                                <option value="5">Usman Danjuma (APP-00127)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Target Amount -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Monthly Deduction Amount (₦):</label>
                            <input type="number" class="form-control" name="monthly_target" required>
                        </div>
                    </div>

                    <!-- Set Button -->
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">Set Target</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Existing Targets Table -->
        <div class="card-box mb-30">
            <h4 class="h4 pd-20">Current Deduction Targets</h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Staff Name</th>
                            <th>Application ID</th>
                            <th>Monthly Target (₦)</th>
                            <th>Last Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kabiru Sani</td>
                            <td>APP-00123</td>
                            <td>₦20,000</td>
                            <td>2025-07-15</td>
                            <td><a href="#" class="btn btn-sm btn-outline-primary">Edit</a></td>
                        </tr>
                        <tr>
                            <td>Aisha Bello</td>
                            <td>APP-00124</td>
                            <td>₦15,000</td>
                            <td>2025-07-14</td>
                            <td><a href="#" class="btn btn-sm btn-outline-primary">Edit</a></td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>