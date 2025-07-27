<div>
  <!-- Welcome Message -->
  <div class="card-box pd-20 mb-30 shadow-sm rounded-lg bg-light">
    <div class="row align-items-center">
      <div class="col-md-3">
        <img src="{{ asset('admin/vendors/images/dash-img.png') }}" alt="Vehicle Entry" class="img-fluid">
      </div>
      <div class="col-md-9">
        <h4 class="font-20 mb-2">Welcome, <span class="text-primary font-30">{{ Auth::user()->lastname }}!</span></h4>
        <p class="font-16 text-secondary">Monitor vehicle entries, identify plates, and verify registration status.</p>
      </div>
    </div>
  </div>

  <!-- KPI Widgets -->
  <div class="row mb-30">
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card-box bg-white shadow-sm p-3 text-center rounded">
        <h5>Total Captures</h5>
        <div id="widget-total-captures" class="h3 text-primary">256</div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card bg-white shadow-sm p-3 text-center rounded">
        <h5>Registered Vehicles</h5>
        <div id="widget-registered" class="h3 text-success">230</div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card bg-white shadow-sm p-3 text-center rounded">
        <h5>Unregistered Plates</h5>
        <div id="widget-unregistered" class="h3 text-danger">26</div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card bg-white shadow-sm p-3 text-center rounded">
        <h5>Entries Today</h5>
        <div id="widget-today" class="h3 text-info">54</div>
      </div>
    </div>
  </div>

  <!-- Charts -->
  <div class="row mb-30">
    <div class="col-xl-8 mb-3">
      <div class="card-box height-100-p pd-20 shadow-sm rounded">
        <h2 class="h4 mb-20">Capture Trend (Last 7 Days)</h2>
        <div id="chart5"></div>
      </div>
    </div>
    <div class="col-xl-4 mb-3">
      <div class="card-box height-100-p pd-20 shadow-sm rounded">
        <h2 class="h5 mb-20">Registration Status Breakdown</h2>
        <div id="chart6"></div>
      </div>
    </div>
  </div>

  <!-- Recent Captures Table -->
  <div class="card-box mb-30 shadow-sm rounded">
    <div class="d-flex justify-content-between align-items-center pd-20">
      <h2 class="h4 mb-0">Recent Plate Scans</h2>
      <a href="{{ route('plate.scan.records') }}" class="btn btn-sm btn-outline-primary">View all</a>
    </div>
    <div class="table-responsive pd-20">
      <table class="table table-striped table-hover nowrap">
        <thead class="thead-light">
          <tr>
            <th>ID</th>
            <th>Plate Number</th>
            <th>Entry Time</th>
            <th>Status</th>
            <th>Detected By</th>
            <th>Photo</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#1021</td>
            <td>ABC123AB</td>
            <td>2025‑07‑26 08:15 AM</td>
            <td><span class="badge badge-success">Registered</span></td>
            <td>Scanner 1</td>
            <td><img src="{{ asset('storage/img/plates/20250726_0815_plate.jpg') }}" alt="plate" class="rounded" style="max-width: 60px;"></td>
          </tr>
          <!-- More rows here -->
        </tbody>
      </table>
    </div>
  </div>
</div>
