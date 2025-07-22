<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class WelcomeComponent extends Component
{
    public function render()
    {
        return view('livewire.guest.welcome-component')->layout('layouts.guest');
    }
}
