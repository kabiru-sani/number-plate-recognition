<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class ContactComponent extends Component
{
    public function render()
    {
        return view('livewire.guest.contact-component')->layout('layouts.guest');
    }
}
