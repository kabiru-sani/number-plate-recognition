<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminViewApplicationDetails extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-view-application-details')->layout('layouts.app');
    }
}
