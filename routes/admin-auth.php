<?php

use App\Http\Controllers\admin\AppointmentController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ProfileController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DoctorOPDController;
use App\Http\Controllers\admin\ExaminationReportController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\admin\ManageTestController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\admin\ServiceBillController;
use App\Http\Controllers\admin\OPD_BillController;
use App\Http\Controllers\admin\OPDSaleReportController;
use App\Http\Controllers\admin\PackageBillController;
use App\Http\Controllers\admin\PackageSaleReportController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\ServiceSaleReportController;
use App\Http\Controllers\admin\StainReportController;
use App\Http\Controllers\admin\TestReferencesController;
use App\Http\Controllers\admin\UserController;
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

    Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    //Departments
    Route::get('/department', [DepartmentController::class, 'show'])->name('department.show');
    Route::get('/departments', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::patch('/departments/{department}', [DepartmentController::class, 'update'])->name('department.update');
    Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('department.destroy');

    //Services
    Route::get('/services', [ServiceController::class, 'show'])->name('service.show');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::patch('/services/{service}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');

    //Packages
    Route::get('/packages', [PackageController::class, 'show'])->name('package.show');
    Route::get('/packages/create', [PackageController::class, 'create'])->name('package.create');
    Route::post('/packages', [PackageController::class, 'store'])->name('package.store');
    Route::get('/packages/{id}/edit', [PackageController::class, 'edit'])->name('package.edit');
    Route::patch('/packages/{package}', [PackageController::class, 'update'])->name('package.update');
    Route::delete('/packages/{id}', [PackageController::class, 'destroy'])->name('package.destroy');

    //Employee
    Route::get('/employee/show', [EmployeeController::class, 'show'])->name('employee.show');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::patch('/employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');


    //DoctorOPD
    Route::get('/doctoropd/show', [DoctorOPDController::class, 'show'])->name('doctoropd.show');
    Route::get('/doctoropd/create', [DoctorOPDController::class, 'create'])->name('doctoropd.create');
    Route::post('/doctoropd', [DoctorOPDController::class, 'store'])->name('doctoropd.store');
    Route::get('/doctoropd/edit/{id}', [DoctorOPDController::class, 'edit'])->name('doctoropd.edit');
    Route::patch('/doctoropd/{id}', [DoctorOPDController::class, 'update'])->name('doctoropd.update');
    Route::delete('/doctoropd/{id}', [DoctorOPDController::class, 'destroy'])->name('doctoropd.destroy');


    //Invoice   
    Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('/invoice', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/invoice', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::get('/invoice/{id}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::patch('/invoice/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
    Route::delete('/invoice/{id}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');



    //Appointment
    Route::get('/appointment/show', [AppointmentController::class, 'show'])->name('appointment.show');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointment.edit');
    Route::patch('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointment.update');
    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');

    //Ptient

    // Route::get('/patient/show', [PatientController::class, 'show'])->name('patient.show');
    Route::get('/patient/show', [PatientController::class, 'show'])->name('patient.show');
    Route::get('/patients/create', [PatientController::class, 'create'])->name('patient.create');
    Route::post('/patients', [PatientController::class, 'store'])->name('patient.store');
    Route::get('/patients/{patient}', [PatientController::class, 'edit'])->name('patient.edit');
    Route::put('patients/patients/{id}', [PatientController::class, 'update'])->name('admin.patient.update');
    Route::delete('patients/{id}', [PatientController::class, 'destroy'])->name('patient.destroy');


    //Service-Bill
    Route::get('/service-bill', [ServiceBillController::class, 'show'])->name('servicebill.show');
    Route::get('/service-bill', [ServiceBillController::class, 'create'])->name('servicebill.creat');
    Route::get('/service-bill', [ServiceBillController::class, 'store'])->name('servicebill.store');
    Route::get('/service-bill', [ServiceBillController::class, 'edit'])->name('servicebill.edit');
    Route::get('/service-bill', [ServiceBillController::class, 'update'])->name('servicebill.update');
    Route::get('/service-bill', [ServiceBillController::class, 'delete'])->name('servicebill.delete');

    //OPD-Bill
    Route::get('/OPD-bill', [OPD_BillController::class, 'show'])->name('OPDbill.show');
    Route::get('/OPD-bill', [OPD_BillController::class, 'create'])->name('OPDbill.craete');
    Route::get('/OPD-bill', [OPD_BillController::class, 'store'])->name('OPDbill.store');
    Route::get('/OPD-bill', [OPD_BillController::class, 'edit'])->name('OPDbill.edit');
    Route::get('/OPD-bill', [OPD_BillController::class, 'update'])->name('OPDbill.update');
    Route::get('/OPD-bill', [OPD_BillController::class, 'delete'])->name('OPDbill.delete');

    //Package-Bill
    Route::get('/package-bill', [PackageBillController::class, 'show'])->name('packagebill.show');
    Route::get('/package-bill', [PackageBillController::class, 'create'])->name('packagebill.create');
    Route::get('/package-bill', [PackageBillController::class, 'store'])->name('packagebill.store');
    Route::get('/package-bill', [PackageBillController::class, 'edit'])->name('packagebill.edit');
    Route::get('/package-bill', [PackageBillController::class, 'update'])->name('packagebill.update');
    Route::get('/package-bill', [PackageBillController::class, 'delete'])->name('packagebill.delete');

    //Service Sale-Report
    Route::get('/service-sale-report', [ServiceSaleReportController::class, 'show'])->name('servicesalereport.show');
    Route::get('/service-sale-report', [ServiceSaleReportController::class, 'create'])->name('servicesalereport.create');
    Route::get('/service-sale-report', [ServiceSaleReportController::class, 'store'])->name('servicesalereport.store');
    Route::get('/service-sale-report', [ServiceSaleReportController::class, 'edit'])->name('servicesalereport.edit');
    Route::get('/service-sale-report', [ServiceSaleReportController::class, 'update'])->name('servicesalereport.update');
    Route::get('/service-sale-report', [ServiceSaleReportController::class, 'delete'])->name('servicesalereport.delete');

    //OPD Sale-Report
    Route::get('/OPD-sale-report', [OPDSaleReportController::class, 'show'])->name('OPDsalereport.show');
    Route::get('/OPD-sale-report', [OPDSaleReportController::class, 'show'])->name('OPDsalereport.show');
    Route::get('/OPD-sale-report', [OPDSaleReportController::class, 'show'])->name('OPDsalereport.show');
    Route::get('/OPD-sale-report', [OPDSaleReportController::class, 'show'])->name('OPDsalereport.show');
    Route::get('/OPD-sale-report', [OPDSaleReportController::class, 'show'])->name('OPDsalereport.show');
    Route::get('/OPD-sale-report', [OPDSaleReportController::class, 'show'])->name('OPDsalereport.show');

    //Package Sale-report
    Route::get('/package-sale-report', [PackageSaleReportController::class, 'show'])->name('packagesalereport.show');

    //Manage Test
    Route::get('/manage-test', [ManageTestController::class, 'show'])->name('managaetest.show');

    //Test Reference
    Route::get('/test-reference', [TestReferencesController::class, 'show'])->name('testreference.show');

    //Examination Report
    Route::get('/examination-report', [ExaminationReportController::class, 'show'])->name('examinationreport.show');

    //Stain Report
    Route::get('/stain-report', [StainReportController::class, 'show'])->name('stainreport.show');

    //Report
    Route::get('/report', [ReportController::class, 'show'])->name('report.show');

    //User
    Route::get('/user', [UserController::class, 'show'])->name('user.show');
});