<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

use App\Livewire\Guest\WelcomeComponent;
use App\Livewire\Guest\AboutComponent;
use App\Livewire\Guest\ServicesComponent;
use App\Livewire\Guest\ContactComponent;

use App\Http\Controllers\DashboardController;

use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\Admin\Staff\StaffManagementComponent;
use App\Livewire\Admin\Staff\EditStaffComponent;
use App\Livewire\Admin\Staff\ViewStaffComponent;

use App\Livewire\Admin\ManageStaffApplicationComponent;


use App\Livewire\Staff\StaffDashboardComponent;


use App\Livewire\PlateScanner;
use App\Livewire\PlateScanRecord;
use App\Livewire\LivePlateCapture;



Route::get('/',WelcomeComponent::class)->name('home');
Route::get('/about-us',AboutComponent::class)->name('about');
Route::get('/our-services',ServicesComponent::class)->name('services');
Route::get('/contact-us',ContactComponent::class)->name('contact');


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('/dashboard',[ DashboardController::class,'dashboard'])->name('dashboard');

    Route::middleware(['admin'])->prefix('admin')->group(function(){
        Route::get('/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
        Route::get('/user-management',StaffManagementComponent::class)->name('users.index');
        Route::get('/user/{id}/edit',EditStaffComponent::class)->name('user.edit');
        Route::get('/user/{id}/show',ViewStaffComponent::class)->name('user.show');

        Route::get('/scan-plate',PlateScanner::class)->name('plate.scan');
        Route::get('/scaned-plates-record',PlateScanRecord::class)->name('plate.scan.records');
        Route::get('/live-plate-capture',LivePlateCapture::class)->name('plate.scan.live');
    });

    Route::middleware(['staff'])->prefix('staff')->group(function(){
        Route::get('/dashboard',StaffDashboardComponent::class)->name('staff.dashboard');
    });
});
