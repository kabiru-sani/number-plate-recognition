<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PlateScan;

class PlateScanRecord extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedScan = null;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function viewScan($id)
    {
        $this->selectedScan = PlateScan::findOrFail($id);
        $this->dispatch('show-scan-modal');
    }

    public function render()
    {
        $history = PlateScan::where('user_id', auth()->id())
            ->when($this->search, fn($query) => $query->where('plate', 'like', '%' . $this->search . '%'))
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('livewire.plate-scan-record',compact('history'))->layout('layouts.app');
    }
}
