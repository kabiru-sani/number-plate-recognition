<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileComponent extends Component
{
    public $current_passowrd;
    public $password;
    public $password_confirmation;
    public $message = [
        'current_passowrd.required' => "Please your current password",
        'password.required' => "Please enter your new password",
        'password_confirmation.required' => "Please confirm your new password",
        'same.confirmed' => "password mismatch",
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
            $this->dispatch('errorfeedback',errorfeedback:' Your current password does not match our record');
        }else{
            User::find(Auth::user()->id)->update([
                'password' => Hash::make($this->password),
            ]);
            $this->reset();
            $this->dispatch('feedback',feedback:  'Password Changed Successfully');
        }

    }

    public function render()
    {
        $staff = User::find(Auth::user()->id);
        return view('livewire.profile.profile-component',compact('staff'))->layout('layouts.app');
    }
}
