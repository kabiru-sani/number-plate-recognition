<?php

namespace App\Livewire\Admin\Applications;

use Livewire\Component;

class AdminNewApplicationComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.applications.admin-new-application-component')->layout('layouts.app');
    }
}
