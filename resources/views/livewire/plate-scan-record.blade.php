<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Plate Scan History</h4>
        <input type="text" class="form-control w-25" placeholder="Search by plate..." wire:model.debounce.500ms="search">
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Date</th>
                    <th>Plate</th>
                    <th>Confidence</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($history as $scan)
                    <tr>
                        <td>{{ $scan->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $scan->plate }}</td>
                        <td>{{ round($scan->score * 100, 2) }}%</td>
                        <td><img src="{{ asset('/assets/img/plates' . $scan->image_path) }}" alt="Plate Image" width="60" class="img-thumbnail"></td>
                        <td>
                            <button class="btn btn-sm btn-outline-info" wire:click="viewScan({{ $scan->id }})">View</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No scan history found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $history->links() }}
    </div>

    {{-- Modal --}}
    <div wire:ignore.self class="modal fade" id="scanModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                @if ($selectedScan)
                    <div class="modal-header">
                        <h5 class="modal-title">Scan Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Plate:</strong> {{ $selectedScan->plate }}</p>
                        <p><strong>Confidence:</strong> {{ round($selectedScan->score * 100, 2) }}%</p>
                        <img src="{{ asset('storage/' . $selectedScan->image_path) }}" class="img-fluid rounded mb-3" style="max-width: 300px;">

                        <h6>Raw API Response:</h6>
                        <pre class="bg-light p-3 rounded" style="max-height: 300px; overflow-y: auto;">{{ json_encode(json_decode($selectedScan->raw_response), JSON_PRETTY_PRINT) }}</pre>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('show-scan-modal', () => {
            const modal = new bootstrap.Modal(document.getElementById('scanModal'));
            modal.show();
        });
    </script>
</div>
