<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ProfileController;

use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DoctorOPDController;
use App\Http\Controllers\Admin\InvoiceController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['verified'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/department', [DepartmentController::class, 'show'])->name('department.show');
    // Route::get('/department', [DepartmentController::class, 'edit'])->name('department.edit');//
    Route::post('/department', [DepartmentController::class, 'store'])->name('department.store');
    //  Route::delete('/department', [DepartmentController::class, 'delete'])->name('department.delete');

    //Route::get('/service', [ServiceController::class, 'show'])->name('service.show');
    //    // Route::get('/service', [ServiceController::class, 'edit'])->name('service.edit');
    //    Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
    // Route::delete('/service', [ServiceController::class, 'delete'])->name('service.delete');

    // Route::get('/package', [PackageController::class, 'show'])->name('package.show');
    // Route::get('/package', [PackageController::class, 'edit'])->name('package.edit');
    // Route::post('/package', [PackageController::class, 'store'])->name('package.store');
    // Route::delete('/package', [PackageController::class, 'delete'])->name('package.delete');

    // Route::get('/employee', [EmployeeController::class, 'show'])->name('employee.show');
    // Route::get('/employee', [EmployeeController::class, 'edit'])->name('employee.edit');
    // Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
    // Route::delete('/employee', [EmployeeController::class, 'delete'])->name('employee.delete');

    // Route::get('/doctoropd', [DoctorOPDController::class, 'show'])->name('doctoropd.show');
    // Route::get('/doctoropd', [DoctorOPDController::class, 'edit'])->name('doctoropd.edit');
    // Route::get('/doctoropd', [DoctorOPDController::class, 'store'])->name('doctoropd.store');
    // Route::get('doctoropd', [DoctorOPDController::class, 'delete'])->name('doctoropd.delete');

    // Route::get('invoice', [InvoiceController::class, 'show'])->name('invoice.show');
    // Route::get('invoice', [InvoiceController::class, 'edit'])->name('invoice.edit');
    // Route::get('invoice', [InvoiceController::class, 'store'])->name('invoice.store');
    // Route::get('invoice', [InvoiceController::class, 'delete'])->name('invoice.delete');
});
