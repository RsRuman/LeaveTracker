<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Employee\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $authUser = Auth::user();

    if (!$authUser) {
        return redirect()->route('login');
    }

    if ($authUser->type === 'employee') {
        return redirect()->route('employee.dashboard');
    }

    return redirect()->route('admin.dashboard');
});

Route::get('/sign-up', [AuthenticationController::class, 'registrationForm'])->name('registration');
Route::post('/sign-up', [AuthenticationController::class, 'registration'])->name('registration.submit');
Route::get('/sign-in', [AuthenticationController::class, 'loginForm'])->name('login');
Route::post('/sign-in', [AuthenticationController::class, 'login'])->name('login.submit');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'employee', 'middleware' => ['auth', 'employee'], 'as' => 'employee.'], function () {
    Route::get('dashboard', [EmployeeController::class, 'index'])->name('dashboard');
    Route::get('leave-request', [EmployeeController::class, 'createLeaveRequest'])->name('leaveRequest.create');
    Route::post('leave-request', [EmployeeController::class, 'storeLeaveRequest'])->name('leaveRequest.store');
    Route::get('leave-histories', [EmployeeController::class, 'leaveRequestHistories'])->name('leaveRequest.histories');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('employees', [AdminController::class, 'employeeList'])->name('employee.list');
    Route::post('employees/{id}', [AdminController::class, 'updateEmployeeStatus'])->name('employee.update.status');
});
