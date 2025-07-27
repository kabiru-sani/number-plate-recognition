<?php

namespace App\Livewire\Admin\Staff;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class EditStaffComponent extends Component
{
    use WithFileUploads;

    public $staff_id;
    public $firstname;
    public $middlename;
    public $lastname;
    public $service_number;
    public $rank;
    public $unit;
    public $role;
    public $email;
    public $phone;
    public $status;
    public $profile_photo_path;
    public $user; 

    public $password, $password_confirmation;

    protected function rules()
    {
        return [
            'firstname'   => 'required|string|max:255',
            'middlename'  => 'nullable|string|max:255',
            'lastname'    => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email,' . $this->staff_id,
            'phone'       => 'required|string|unique:users,phone,' . $this->staff_id,
            'service_number' => 'required|string|unique:users,service_number,' . $this->staff_id,
            'unit'        => 'required|string|max:255',
            'rank'        => 'required|string|max:255',
            'role'        => 'required|in:admin,officer,personnel',
            'status'      => 'required|in:Active,Inactive',
            'password'    => 'nullable|min:8|confirmed',
        ];
    }

    public function mount($id)
    {
        $this->staff_id = $id;
        $user = User::findOrFail($id);
        
        // Initialize properties directly without using $this->user
        $this->firstname = $user->firstname;
        $this->middlename = $user->middlename;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->service_number = $user->service_number;
        $this->unit = $user->unit;
        $this->rank = $user->rank;
        $this->role = $user->role;
        $this->status = $user->status;
    }

    public function updateStaff()
    {
        $this->validate();

        $user = User::findOrFail($this->staff_id);
        $updateData = [
            'firstname'      => $this->firstname,
            'middlename'     => $this->middlename,
            'lastname'       => $this->lastname,
            'service_number' => $this->service_number,
            'rank'           => $this->rank,
            'unit'           => $this->unit,
            'role'           => $this->role,
            'email'          => $this->email,
            'phone'          => $this->phone,
            'status'         => $this->status,
        ];

        // Only update password if provided
        if ($this->password) {
            $updateData['password'] = Hash::make($this->password);
        }

        $user->update($updateData);

        $this->dispatch('feedback', feedback: "Staff record updated successfully!");
        
        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.admin.staff.edit-staff-component')->layout('layouts.app');
    }
}
