<?php

namespace App\Livewire\Admin\Staff;

use Livewire\Component;
use App\Models\User;

class ViewStaffComponent extends Component
{
     public $user;
    public $staffId;
    
    // Military ranks for reference (could also be a model)
    public $ranks = [
        'General',
        'Lieutenant General',
        'Major General',
        'Brigadier General',
        'Colonel',
        'Lieutenant Colonel',
        'Major',
        'Captain',
        'Lieutenant',
        'Second Lieutenant',
        'Master Warrant Officer',
        'Warrant Officer',
        'Staff Sergeant',
        'Sergeant',
        'Corporal',
        'Lance Corporal',
        'Private'
    ];
    
    // Military units for reference
    public $units = [
        '1 Division',
        '2 Division',
        '3 Division',
        '81 Division',
        '82 Division',
        'Army Headquarters',
        'Nigerian Army Armoured Corps',
        'Nigerian Army Artillery Corps',
        'Nigerian Army Engineers',
        'Nigerian Army Signals',
        'Nigerian Army Medical Corps'
    ];

    public function mount($id)
    {
        $this->staffId = $id;
        $this->loadUserData();
    }

    public function loadUserData()
    {
        $this->user = User::findOrFail($this->staffId);
    }

    public function render()
    {
        return view('livewire.admin.staff.view-staff-component', [
            'ranks' => $this->ranks,
            'units' => $this->units,
        ])->layout('layouts.app');
    }
}
