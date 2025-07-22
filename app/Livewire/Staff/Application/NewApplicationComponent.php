<?php

namespace App\Livewire\Staff\Application;

use Livewire\Component;

class NewApplicationComponent extends Component
{
    public function render()
    {
        return view('livewire.staff.application.new-application-component')->layout('layouts.app');
    }
}
