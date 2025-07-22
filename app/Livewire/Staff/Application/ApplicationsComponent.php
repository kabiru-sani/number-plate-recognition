<?php

namespace App\Livewire\Staff\Application;

use Livewire\Component;

class ApplicationsComponent extends Component
{
    public function render()
    {
        return view('livewire.staff.application.applications-component')->layout('layouts.app');
    }
}
