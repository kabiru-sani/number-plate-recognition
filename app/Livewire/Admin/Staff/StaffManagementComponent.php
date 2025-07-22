<?php

namespace App\Livewire\Admin\Staff;

use Livewire\Component;

class StaffManagementComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.staff.staff-management-component')->layout('layouts.app');
    }
}
