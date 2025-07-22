<div>
    <div class="min-height-200px">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <h4>Staff Management</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Staff Management</li>
                </ol>
            </nav>
            <div class="text-right mt-2">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addStaffModal">
                    <i class="fa fa-user-plus mr-1"></i> Add New Staff
                </button>
            </div>
        </div>

        <!-- Controls: Filter, Search & Export -->
        <div class="card-box pd-20 d-flex flex-wrap justify-content-between align-items-center mb-4">
            <div class="d-flex gap-2">
                <select class="form-control mr-2" id="deptFilter" onchange="filterDept()">
                    <option value="">All Departments</option>
                    <option>HR</option>
                    <option>Finance</option>
                    <option>Engineering</option>
                </select>
                <input type="text" class="form-control mr-2" id="staffSearch" placeholder="Search by name or ID..."
                    onkeyup="filterStaff()">
            </div>
            <div>
                <button onclick="exportPDF()" class="btn btn-outline-danger btn-sm mr-2">Export PDF</button>
                <button onclick="exportExcel()" class="btn btn-outline-success btn-sm">Export Excel</button>
            </div>
        </div>

        <!-- Staff Table -->
        <div class="card-box mb-30">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="staffTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Staff Name</th>
                            <th>Staff ID</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Wallet Balance (₦)</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kabiru Sani</td>
                            <td>STAFF-001</td>
                            <td>Admin</td>
                            <td>kabiru@example.com</td>
                            <td>₦150,000</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link dropdown-toggle" href="#" data-toggle="dropdown"><i
                                            class="dw dw-more"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#viewStaffModal"><i class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#editStaffModal"><i class="dw dw-edit2"></i> Edit</a>
                                        <a class="dropdown-item text-warning" href="#"><i class="dw dw-user-down"></i>
                                            Deactivate</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Ishaq Kamaldeen</td>
                            <td>STAFF-002</td>
                            <td>Finance</td>
                            <td>kamal@example.com</td>
                            <td>₦250,000</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link dropdown-toggle" href="#" data-toggle="dropdown"><i
                                            class="dw dw-more"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#viewStaffModal"><i class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#editStaffModal"><i class="dw dw-edit2"></i> Edit</a>
                                        <a class="dropdown-item text-warning" href="#"><i class="dw dw-user-down"></i>
                                            Deactivate</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('livewire.admin.staff.modals.add-staff')
    @include('livewire.admin.staff.modals.edit-staff')
    @include('livewire.admin.staff.modals.view-staff')

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
  function filterStaff() {
    const v = document.getElementById('staffSearch').value.toLowerCase();
    document.querySelectorAll('#staffTable tbody tr').forEach(r => {
      r.style.display = r.textContent.toLowerCase().includes(v) ? '' : 'none';
    });
  }

  function filterDept() {
    const v = document.getElementById('deptFilter').value.toLowerCase();
    document.querySelectorAll('#staffTable tbody tr').forEach(r => {
      const dept = r.cells[2].textContent.toLowerCase();
      r.style.display = v === '' || dept === v ? '' : 'none';
    });
  }

  function exportExcel() {
    const wb = XLSX.utils.table_to_book(document.getElementById("staffTable"), {sheet:"StaffList"});
    XLSX.writeFile(wb, "Staff-List.xlsx");
  }

  function exportPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    doc.autoTable({ html: '#staffTable' });
    doc.save('Staff-List.pdf');
  }
</script>
