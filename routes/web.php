<?php

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

Route::group(['prefix' => 'employee', 'middleware' => 'auth', 'as' => 'employee.'], function () {
    Route::get('dashboard', [ EmployeeController::class, 'index'])->name('dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::get('dashboard', function () {
        echo 'admin dashboard';
    })->name('dashboard');
});
