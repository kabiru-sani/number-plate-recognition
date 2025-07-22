<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class ServicesComponent extends Component
{
    public function render()
    {
        return view('livewire.guest.services-component')->layout('layouts.guest');
    }
}
