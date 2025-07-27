<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\PlateScan;
use App\Models\User;
use Carbon\Carbon;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class AdminDashboardComponent extends Component
{
    public $totalCaptures;
    public $registeredPlates;
    public $unregisteredPlates;
    public $todayEntries;
    public $trendLabels = [];
    public $trendData = [];
    public $recentScans;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        // Total captures count
        $this->totalCaptures = PlateScan::count();

        // Registered vs unregistered plates
        $this->registeredPlates = PlateScan::whereNotNull('plate')->count();
        $this->unregisteredPlates = $this->totalCaptures - $this->registeredPlates;

        // Today's entries
        $this->todayEntries = PlateScan::whereDate('created_at', today())->count();

        // Last 7 days trend data
        $this->loadTrendData();

        // Recent scans
        $this->recentScans = PlateScan::with('user')
            ->latest()
            ->take(10)
            ->get();
    }

    protected function loadTrendData()
    {
        $startDate = now()->subDays(6)->startOfDay();
        $endDate = now()->endOfDay();

        $scansByDay = PlateScan::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $this->trendLabels = [];
        $this->trendData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dayName = now()->subDays($i)->format('D');
            
            $this->trendLabels[] = $dayName;
            $this->trendData[] = $scansByDay->has($date) ? $scansByDay[$date]->count : 0;
        }
    }

    public function refresh()
    {
        $this->loadData();
        $this->dispatch('updateCharts');
    }
    
    public function render()
    {
        return view('livewire.admin.admin-dashboard-component')->layout('layouts.app');
    }
}
