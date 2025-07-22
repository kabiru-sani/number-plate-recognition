<div>
    <div class="min-height-200px">
        <div class="card-box mb-30 shadow-sm border-left border-primary rounded-lg p-3">
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('admin/vendors/images/team.png') }}" class="rounded-circle shadow-sm" width="80" alt="Avatar">
                </div>
                <div class="col-md-10">
                    <h4 class="mb-1 text-dark font-weight-bold">Kabiru Sani <small class="text-muted">(APP-00123)</small></h4>
                    <p class="mb-1"><strong>Email:</strong> kabiru@example.com &nbsp; | &nbsp; <strong>Phone:</strong> 08012345678</p>
                    <p class="mb-0"><strong>Land:</strong> Abuja Extension &nbsp; | &nbsp; <strong>Size:</strong> 2 Plots</p>
                </div>
            </div>
        </div>

        <!-- Payment Summary Card -->
        <div class="card-box mb-30 shadow-sm rounded-lg p-3 bg-light">
            <h5 class="mb-3 font-weight-bold text-dark">Payment Summary</h5>
            <div class="row text-center">
                <div class="col-md-3 mb-3">
                    <div class="bg-white border shadow-sm p-3 rounded">
                        <h6 class="text-muted">Initial Deposit</h6>
                        <p class="text-success h5 font-weight-bold mb-0">₦100,000</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="bg-white border shadow-sm p-3 rounded">
                        <h6 class="text-muted">Monthly Target</h6>
                        <p class="text-primary h5 font-weight-bold mb-0">₦20,000</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="bg-white border shadow-sm p-3 rounded">
                        <h6 class="text-muted">Daily Deduction</h6>
                        <p class="text-info h5 font-weight-bold mb-0">₦667</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="bg-white border shadow-sm p-3 rounded">
                        <h6 class="text-muted">Total Cost</h6>
                        <p class="text-dark h5 font-weight-bold mb-0">₦500,000</p>
                    </div>
                </div>
            </div>
            
            <!-- Progress Bar -->
            <div class="mt-4">
                <label class="font-weight-bold text-muted">Overall Payment Progress</label>
                <div class="progress" style="height: 20px;">
                    <div class="progress-bar bg-primary font-weight-bold" role="progressbar" style="width: 32%;" aria-valuenow="160000" aria-valuemin="0" aria-valuemax="500000">
                        32% Paid — ₦160,000
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Export -->
        <div class="card-box pd-20 d-flex flex-wrap justify-content-between align-items-center">
            <div class="d-flex gap-2">
                <input type="month" class="form-control mr-2" id="monthFilter">
                <button onclick="filterByMonth()" class="btn btn-outline-primary btn-sm mr-2">Filter</button>
            </div>
            <div>
                <button onclick="exportToPDF()" class="btn btn-outline-danger btn-sm mr-2">Export PDF</button>
                <button onclick="exportToExcel()" class="btn btn-outline-success btn-sm mr-2">Export Excel</button>
            </div>
        </div>

        <!-- Deduction History Table -->
        <div class="card-box mb-30">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="deductionTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Date</th>
                            <th>Amount Deducted (₦)</th>
                            <th>Wallet Balance After (₦)</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2025-07-01</td>
                            <td>₦667</td>
                            <td>₦99,333</td>
                            <td><span class="badge badge-success">Success</span></td>
                        </tr>
                        <tr>
                            <td>2025-07-02</td>
                            <td>₦667</td>
                            <td>₦98,666</td>
                            <td><span class="badge badge-success">Success</span></td>
                        </tr>
                        <tr>
                            <td>2025-07-03</td>
                            <td>₦667</td>
                            <td>₦98,666</td>
                            <td><span class="badge badge-success">Success</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
    function filterByMonth() {
        const selected = document.getElementById("monthFilter").value;
        document.querySelectorAll("#deductionTable tbody tr").forEach(row => {
            const date = row.cells[0].textContent.trim();
            row.style.display = date.startsWith(selected) ? "" : "none";
        });
    }

    function exportToExcel() {
        const wb = XLSX.utils.table_to_book(document.getElementById("deductionTable"), {sheet:"Deductions"});
        XLSX.writeFile(wb, "DeductionHistory.xlsx");
    }

    function exportToPDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        doc.autoTable({ html: '#deductionTable' });
        doc.save('DeductionHistory.pdf');
    }
</script>
