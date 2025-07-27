<?php

namespace App\Livewire\Admin\Staff;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class StaffManagementComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    // Form fields
    public $firstname;
    public $middlename;
    public $lastname;
    public $service_number;
    public $rank;
    public $unit;
    public $role = 'personnel';
    public $email;
    public $phone;
    public $status = 'Active';
    public $profile_photo_path;

    public $showModal = false;

    protected $listeners = ['showAddModal' => 'open'];
    

    public $search = '';

    // protected $listeners = [
    //     'openAddModal',
    //     'openViewModal',
    //     'openEditModal',
    // ];

    public function deactivate($userId)
    {
        $user = User::findOrFail($userId);
        $user->status = 'Inactive';
        $user->save();
        $this->dispatch('feedback', feedback: "User account deactivated");
    }

    public function activate($userId)
    {
        $user = User::findOrFail($userId);
        $user->status = 'Active';
        $user->save();
        $this->dispatch('feedback', feedback: "User account activated");
    }

    public function exportPDF()
    {
        // implement PDF export logic
        return response()->streamDownload(...);
    }

    public function exportExcel()
    {
        // implement Excel export logic
        return Excel::download(new StaffExport($this->search), 'staff.xlsx');
    }

    protected $rules = [
        'firstname' => 'required|string|max:255',
        'middlename' => 'nullable|string|max:255',
        'lastname' => 'required|string|max:255',
        'service_number'  => 'required|string|unique:users,service_number',
        'rank' => 'required|string|max:100',
        'unit' => 'required|string|max:100',
        'role' => 'required|in:admin,officer,personnel',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'required|string|max:20|unique:users',
        'profile_photo_path' => 'nullable|image|max:2048',
    ];

    public function addStaff()
    {
        $this->validate();

        $user = User::create([
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
            'password'       => Hash::make('12345678'),
            'profile_photo_path' => 'user.png',
            // 'profile_photo_path' => $profilePhotoPath,
        ]);

        $this->dispatch('feedback', feedback: "User added successfully");
        
        $this->reset();
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, fn($q) =>
                $q->where(function($sub) {
                    $sub->where('firstname', 'like', '%'.$this->search.'%')
                        ->orWhere('lastname', 'like', '%'.$this->search.'%')
                        ->orWhere('service_number', 'like', '%'.$this->search.'%')
                        ->orWhere('unit', 'like', '%'.$this->search.'%');
                })
            )
            ->orderBy('lastname')
            ->paginate(10);
        return view('livewire.admin.staff.staff-management-component',compact('users'))->layout('layouts.app');
    }
}
