<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard(){

        $role = Auth::user()->role;


        switch ($role) {

          case 'admin':
             return redirect()->route('admin.dashboard');
             break;
          case 'staff':
             return redirect()->route('staff.dashboard');
             break;
        }
    }
}
