<div>
    <div class="min-height-200px">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Land Allocation Detail</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item"><a href="/applications">Applications</a></li>
                            <li class="breadcrumb-item active" aria-current="page">APP-00123</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="row g-4 mb-3">
            <!-- Total Land Cost -->
            <div class="col-xl-3 col-md-6">
                <div class="card-box border-0 shadow-sm text-center p-3">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-cash-coin text-primary fs-1"></i>
                        </div>
                        <h6 class="text-muted mb-1">Total Land Cost</h6>
                        <h4 class="text-primary fw-bold">₦500,000</h4>
                    </div>
                </div>
            </div>

            <!-- Initial Deposit -->
            <div class="col-xl-3 col-md-6">
                <div class="card-box border-0 shadow-sm text-center p-3">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-wallet2 text-success fs-1"></i>
                        </div>
                        <h6 class="text-muted mb-1">Initial Deposit</h6>
                        <h4 class="text-success fw-bold">₦100,000</h4>
                    </div>
                </div>
            </div>

            <!-- Outstanding Balance -->
            <div class="col-xl-3 col-md-6">
                <div class="card-box border-0 shadow-sm text-center p-3">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-exclamation-circle text-danger fs-1"></i>
                        </div>
                        <h6 class="text-muted mb-1">Outstanding Balance</h6>
                        <h4 class="text-danger fw-bold">₦400,000</h4>
                    </div>
                </div>
            </div>

            <!-- Monthly Target -->
            <div class="col-xl-3 col-md-6">
                <div class="card-box border-0 shadow-sm text-center p-3">
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="bi bi-calendar-check text-dark fs-1"></i>
                        </div>
                        <h6 class="text-muted mb-1">Monthly Target</h6>
                        <h4 class="text-dark fw-bold">₦20,000</h4>
                    </div>
                </div>
            </div>
        </div>



        <!-- Wallet Deduction History -->
        <div class="card-box mb-30">
            <div class="pd-20 d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h4 class="text-blue h4">Wallet Deduction History</h4>
                    <p class="mb-0">These are the deductions made so far from your wallet.</p>
                </div>
                <div class="d-flex flex-wrap gap-2 align-items-center mt-2 mt-md-0">
                    {{-- <input type="month" id="monthFilter" class="form-control mr-2" style="min-width: 160px;"> --}}
                    {{-- <button onclick="filterByMonth()" class="btn btn-outline-primary btn-sm mr-2">Filter</button> --}}
                    <button onclick="downloadTableAs('pdf')" class="btn btn-outline-danger btn-sm mr-2">Export PDF</button>
                    <button onclick="downloadTableAs('excel')" class="btn btn-outline-success btn-sm mr-2">Export Excel</button>
                    <button onclick="window.print()" class="btn btn-outline-dark btn-sm">Print</button>
                </div>
                {{-- <input type="text" class="form-control mt-2 mt-sm-0" id="deductionSearch" onkeyup="searchDeductionTable()" placeholder="Search history..." style="max-width: 250px;"> --}}
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered" id="deductionTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Date</th>
                            <th>Amount Deducted</th>
                            <th>Wallet Balance After</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2025-07-10</td>
                            <td>₦1,000</td>
                            <td>₦149,000</td>
                            <td><span class="badge badge-success">Success</span></td>
                        </tr>
                        <tr>
                            <td>2025-07-11</td>
                            <td>₦1,000</td>
                            <td>₦148,000</td>
                            <td><span class="badge badge-success">Success</span></td>
                        </tr>
                        <tr>
                            <td>2025-07-12</td>
                            <td>₦1,000</td>
                            <td>₦147,000</td>
                            <td><span class="badge badge-success">Success</span></td>
                        </tr>
                        <!-- Add more as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        // Search Filter
        function searchDeductionTable() {
            const input = document.getElementById("deductionSearch").value.toLowerCase();
            const rows = document.querySelectorAll("#deductionTable tbody tr");

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }

        // Filter by Month
        function filterByMonth() {
            const selectedMonth = document.getElementById("monthFilter").value;
            const rows = document.querySelectorAll("#deductionTable tbody tr");

            rows.forEach(row => {
                const date = row.cells[0].textContent.trim();
                row.style.display = date.startsWith(selectedMonth) ? "" : "none";
            });
        }

        // Download as PDF or Excel
        function downloadTableAs(type) {
            const table = document.getElementById("deductionTable");
            if (type === 'excel') {
                const wb = XLSX.utils.table_to_book(table, {sheet: "Deduction History"});
                XLSX.writeFile(wb, "Deduction-History.xlsx");
            } else if (type === 'pdf') {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();
                doc.autoTable({ html: '#deductionTable' });
                doc.save('Deduction-History.pdf');
            }
        }
    </script>

<!-- JS Search Script -->
{{-- <script>
    function searchDeductionTable() {
        const input = document.getElementById("deductionSearch");
        const filter = input.value.toLowerCase();
        const table = document.getElementById("deductionTable");
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
</script> --}}
