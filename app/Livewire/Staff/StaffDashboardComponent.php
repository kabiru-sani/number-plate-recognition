<?php

namespace App\Livewire\Staff;

use Livewire\Component;

class StaffDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.staff.staff-dashboard-component')->layout('layouts.app');
    }
}
