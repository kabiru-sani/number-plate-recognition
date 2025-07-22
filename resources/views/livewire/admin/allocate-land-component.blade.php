<div>
    <div class="min-height-200px">
        <div class="page-header">
            <div class="title">
                <h4>Allocate Land</h4>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Allocate Land</li>
                </ol>
            </nav>
        </div>

        <div class="card-box pd-20 mb-30">
            <form action="{{ route('admin.land.allocate') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Staff Selection -->
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

                    <!-- Location -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Land Location:</label>
                            <input type="text" name="location" class="form-control" required>
                        </div>
                    </div>

                    <!-- Plot Number -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Plot Number:</label>
                            <input type="text" name="plot_number" class="form-control">
                        </div>
                    </div>

                    <!-- Plot Size -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Plot Size:</label>
                            <input type="text" name="plot_size" class="form-control" required>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total Price (₦):</label>
                            <input type="number" name="total_price" class="form-control" required>
                        </div>
                    </div>

                    <!-- Initial Deposit -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Initial Deposit (₦):</label>
                            <input type="number" name="deposit" class="form-control">
                        </div>
                    </div>

                    <!-- Payment Schedule -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Payment Start Date:</label>
                            <input type="text" name="payment_start_date" class="form-control date-picker">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Expected Completion Date:</label>
                            <input type="text" name="completion_date" class="form-control date-picker">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Allocate Land</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
