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

use App\Livewire\Admin\Applications\AdminNewApplicationComponent;

use App\Livewire\Admin\ManageStaffApplicationComponent;
use App\Livewire\Admin\AdminViewApplicationDetails;
use App\Livewire\Admin\AllocateLandComponent;
use App\Livewire\Admin\SetDeductionTargetComponent;


use App\Livewire\Staff\StaffDashboardComponent;
use App\Livewire\Staff\Application\NewApplicationComponent;
use App\Livewire\Staff\Application\ApplicationsComponent;
use App\Livewire\Staff\AllocationDetailsComponent;

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

        Route::get('/manage-application',ManageStaffApplicationComponent::class)->name('admin.applications.index');
        Route::get('/application/create',AdminNewApplicationComponent::class)->name('admin.application.create');
        Route::get('/application/{id}/show',AdminViewApplicationDetails::class)->name('admin.application.show');

        Route::get('/allocate-land',AllocateLandComponent::class)->name('admin.land.allocate');
        Route::get('/deduction-setup',SetDeductionTargetComponent::class)->name('admin.deduction.setup');

        Route::get('/scan-plate',PlateScanner::class)->name('plate.scan');
        Route::get('/scaned-plates-record',PlateScanRecord::class)->name('plate.scan.records');
        Route::get('/live-plate-capture',LivePlateCapture::class)->name('plate.scan.live');
    });

    Route::middleware(['staff'])->prefix('staff')->group(function(){
        Route::get('/dashboard',StaffDashboardComponent::class)->name('staff.dashboard');
        Route::get('/application-form',NewApplicationComponent::class)->name('staff.apply');
        Route::get('/applications',ApplicationsComponent::class)->name('application.index');
        Route::get('/allocation-details/{id}/',AllocationDetailsComponent::class)->name('allocation.detail');
    });
});
