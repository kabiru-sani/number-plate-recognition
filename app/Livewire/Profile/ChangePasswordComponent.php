<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChangePasswordComponent extends Component
{
    public $current_passowrd;
    public $password;
    public $password_confirmation;
    public $message = [
        'current_passowrd.required' => "Please your current password",
        'password.required' => "Please your your desired password",
        'password_confirmation.required' => "Please confirm your password",
        'same.confirmed' => "password mismach",
    ];

    public function updated($fields){
        $this->validateOnly($fields,[
            'current_passowrd' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'min:8','same:password'],
        ],$this->message);
    }

    public function changePassword(){
        $this->validate([
            'current_passowrd' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'min:8','same:password'],
        ],$this->message);

        if(!Hash::check($this->current_passowrd, Auth()->user()->password)){
            $this->dispatch('errorfeedback',errorfeedback:' Your current password do not match our record');
        }else{
            User::find(Auth::user()->id)->update([
                'password' => Hash::make($this->password),
            ]);
            $this->reset();
            $this->dispatch('feedback',feedback:  'Password Successfully Changed');
        }

    }

    public function render()
    {
        return view('livewire.profile.change-password-component')->layout('layouts.app');
    }
}
