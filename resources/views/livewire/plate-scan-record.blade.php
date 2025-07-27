<div>
    <div class="card-box pd-20 d-flex flex-wrap justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Plate Scan History</h4>
        <input type="text" class="form-control w-25" placeholder="Search by plate..." wire:model.debounce.500ms="search">
    </div>

    <div class="card-box mb-30">
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <td>SN</td>
                        <th>Date</th>
                        <th>Plate</th>
                        <th>Confidence</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($history as $sn => $scan)
                        <tr>
                            <td>{{ $sn + 1 }}</td>
                            <td>{{ $scan->created_at->format('M j, Y g:i A') }}</td>
                            <td>{{ strtoupper($scan->plate) }}</td>
                            <td>{{ round($scan->score * 100, 2) }}%</td>
                            <td><img src="{{ asset( $scan->image_path) }}" alt="Plate Image" width="80" class="img-thumbnail"></td>
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
    </div>

    {{-- Modal --}}
    @include('livewire.modals.plate-details-modal')
</div>
