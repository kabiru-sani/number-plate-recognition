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

  <div class="row mb-30">
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card-box bg-white shadow-sm p-3 text-center rounded">
        <h5>Total Captures</h5>
        <div class="h3 text-primary">{{ $totalCaptures }}</div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card bg-white shadow-sm p-3 text-center rounded">
        <h5>Registered Vehicles</h5>
        <div class="h3 text-success">{{ $registeredPlates }}</div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card bg-white shadow-sm p-3 text-center rounded">
        <h5>Unregistered Plates</h5>
        <div class="h3 text-danger">{{ $unregisteredPlates }}</div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 mb-3">
      <div class="card bg-white shadow-sm p-3 text-center rounded">
        <h5>Entries Today</h5>
        <div class="h3 text-info">{{ $todayEntries }}</div>
      </div>
    </div>
  </div>

  <!-- Charts -->
  <div class="row mb-30">
    <div class="col-xl-8 mb-3">
      <div class="card-box height-60-p pd-20 shadow-sm rounded">
        <h2 class="h4 mb-20">Capture Trend (Last 7 Days)</h2>
        <div wire:ignore>
          <canvas id="captureTrendChart" height="300"></canvas>
        </div>
      </div>
    </div>
    <div class="col-xl-4 mb-3">
      <div class="card-box height-80-p pd-20 shadow-sm rounded">
        <h2 class="h5 mb-20">Registration Status Breakdown</h2>
        <div wire:ignore>
          <canvas id="registrationStatusChart" height="300"></canvas>
        </div>
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
          @foreach($recentScans as $scan)
          <tr>
            <td>#{{ $scan->id }}</td>
            <td>{{ strtoupper($scan->plate ?? 'N/A') }}</td>
            <td>{{ $scan->created_at->format('Y-m-d h:i A') }}</td>
            <td>
              <span class="badge badge-{{ $scan->plate ? 'success' : 'danger' }}">
                {{ $scan->plate ? 'Registered' : 'Unregistered' }}
              </span>
            </td>
            <td>
              @if($scan->user)
              {{ $scan->user->firstname }} ({{ $scan->user->service_number }})
              @else
              System
              @endif
            </td>
            <td>
              @if($scan->image_path)
              <img src="{{ asset( $scan->image_path) }}" alt="plate" class="rounded" style="max-width: 60px;">
              @else
              N/A
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  @push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.addEventListener('livewire:init', () => {
    // Capture Trend Chart
    const trendCtx = document.getElementById('captureTrendChart').getContext('2d');
    const trendChart = new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: @json($trendLabels),
            datasets: [{
                label: 'Plate Captures',
                data: @json($trendData),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Registration Status Chart
    const statusCtx = document.getElementById('registrationStatusChart').getContext('2d');
    const statusChart = new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Registered', 'Unregistered'],
            datasets: [{
                data: [{{ $registeredPlates }}, {{ $unregisteredPlates }}],
                backgroundColor: [
                    'rgba(40, 167, 69, 0.8)',
                    'rgba(220, 53, 69, 0.8)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });

    // Refresh charts when Livewire updates
    Livewire.on('updateCharts', () => {
        trendChart.data.labels = @json($trendLabels);
        trendChart.data.datasets[0].data = @json($trendData);
        trendChart.update();
        
        statusChart.data.datasets[0].data = [{{ $registeredPlates }}, {{ $unregisteredPlates }}];
        statusChart.update();
    });
});
  </script>
  @endpush

</div>