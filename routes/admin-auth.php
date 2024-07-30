<?php


use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ProfileController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\AppointmentController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DoctorOPDController;
use App\Http\Controllers\Admin\ExaminationReportController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ManageTestController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\ServiceBillController;
use App\Http\Controllers\Admin\OpdBillController;
use App\Http\Controllers\Admin\PackageBillController;
use App\Http\Controllers\Admin\OPDSaleReportController;
use App\Http\Controllers\Admin\PackageSaleReportController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ServiceSaleReportController;
use App\Http\Controllers\Admin\StainReportController;
use App\Http\Controllers\Admin\TestReferencesController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['verified'])->name('dashboard');

    //Departments
    Route::get('/departments/show', [DepartmentController::class, 'show'])->name('department.show');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::patch('/departments/{department}', [DepartmentController::class, 'update'])->name('department.update');
    Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('department.destroy');

    //Services
    Route::get('services/show', [ServiceController::class, 'show'])->name('service.show');
    Route::get('services/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('services', [ServiceController::class, 'store'])->name('service.store');
    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::match(['put', 'patch'], 'services/{service}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');

    //Packages
    // Route::get('/packages/show', [PackageController::class, 'show'])->name('package.show');
    // Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
    // Route::post('/packages', [PackageController::class, 'store'])->name('packages.store');
    // Route::get('/packages/{id}/edit', [PackageController::class, 'edit'])->name('packages.edit');
    // Route::patch('/packages/{id}', [PackageController::class, 'update'])->name('packages.update');
    // Route::delete('/packages/{id}', [PackageController::class, 'destroy'])->name('packages.destroy');

    //Employee
    Route::get('/employees/show', [EmployeeController::class, 'show'])->name('employee.show');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::patch('/employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

    //DoctorOPD
    Route::get('/opd-doctors/show', [DoctorOPDController::class, 'show'])->name('doctoropd.show');
    Route::get('/opd-doctor/create', [DoctorOPDController::class, 'create'])->name('doctoropd.create');
    Route::post('/opd-doctor', [DoctorOPDController::class, 'store'])->name('doctoropd.store');
    Route::get('/opd-doctor/edit/{id}', [DoctorOPDController::class, 'edit'])->name('doctoropd.edit');
    Route::patch('/opd-doctor/{id}', [DoctorOPDController::class, 'update'])->name('doctoropd.update');
    Route::delete('/opd-doctor/{id}', [DoctorOPDController::class, 'destroy'])->name('doctoropd.destroy');

    //Invoice  
    Route::get('/invoice', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('/invoice', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/invoice/{id}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::patch('/invoice/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
    Route::delete('/invoice/{id}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
    // Route::get('/invoice/pdf', [InvoiceController::class, 'generatePDF'])->name('invoice.pdf');

    //Ptient
    Route::get('/patient/show', [PatientController::class, 'show'])->name('patient.show');
    Route::get('/patients/create', [PatientController::class, 'create'])->name('patient.create');
    Route::post('/patients', [PatientController::class, 'store'])->name('patient.store');
    Route::get('/patients/{patient}', [PatientController::class, 'edit'])->name('patient.edit');
    Route::put('patients/patients/{id}', [PatientController::class, 'update'])->name('patient.update');
    Route::delete('patients/{id}', [PatientController::class, 'destroy'])->name('patient.destroy');

    //Appointment
    Route::get('/appointment/show', [AppointmentController::class, 'show'])->name('appointment.show');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointment.edit');
    Route::patch('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointment.update');
    Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');

    //Service-Bill
    Route::get('/service-bill', [ServiceBillController::class, 'show'])->name('servicebill.show');
    Route::get('/service-bill/create', [ServiceBillController::class, 'create'])->name('servicebill.create');
    Route::post('/admin/service-bill/store', [OPDBillController::class, 'store'])->name('OPDbill.store');
    Route::get('/service-bill/{id}/edit', [ServiceBillController::class, 'edit'])->name('servicebill.edit');
    Route::put('/admin/service-bill/update/{id}', [OPDBillController::class, 'update'])->name('OPDbill.update');
    Route::delete('/admin/service-bill/destroy/{id}', [OPDBillController::class, 'destroy'])->name('OPDbill.destroy');

    //OPD-Bill
    Route::get('/OPD-bill/show', [OpdBillController::class, 'show'])->name('OPDbill.show');
    Route::get('/OPD-bill/create', [OpdBillController::class, 'create'])->name('OPDbill.create');
    Route::post('/OPD-bill', [OpdBillController::class, 'store'])->name('OPDbill.store');
    Route::get('/OPD-bill/{id}/edit', [OpdBillController::class, 'edit'])->name('OPDbill.edit');
    Route::put('/OPD-bill/{id}', [OpdBillController::class, 'update'])->name('OPDbill.update');
    Route::delete('/OPD-bill/{id}', [OpdBillController::class, 'destroy'])->name('OPDbill.destroy');

    //Package-Bill
    Route::get('/package-bill', [PackageBillController::class, 'show'])->name('packagebill.show');
    Route::get('/package-bill/create', [PackageBillController::class, 'create'])->name('packagebill.create');
    Route::post('/package-bill', [PackageBillController::class, 'store'])->name('packagebill.store');
    Route::get('/package-bill/{id}/edit', [PackageBillController::class, 'edit'])->name('packagebill.edit');
    Route::put('/package-bill/{id}', [PackageBillController::class, 'update'])->name('packagebill.update');
    Route::delete('/package-bill/{id}', [PackageBillController::class, 'destroy'])->name('packagebill.destroy');

    //Service Sale-Report
    Route::get('/service-sale-report', [ServiceSaleReportController::class, 'show'])->name('servicesalereport.show');
    Route::get('/service-sale-report/create', [ServiceSaleReportController::class, 'create'])->name('servicesalereport.create');
    Route::post('/service-sale-report', [ServiceSaleReportController::class, 'store'])->name('servicesalereport.store');
    Route::get('/service-sale-report/{id}/edit', [ServiceSaleReportController::class, 'edit'])->name('servicesalereport.edit');
    Route::put('/service-sale-report/{id}', [ServiceSaleReportController::class, 'update'])->name('servicesalereport.update');
    Route::delete('/service-sale-report/{id}', [ServiceSaleReportController::class, 'destroy'])->name('servicesalereport.destroy');

    //OPD Sale-Report
    Route::get('/OPD-sale-report', [OPDSaleReportController::class, 'show'])->name('OPDsalereport.show');
    Route::get('/OPD-sale-report/create', [OPDSaleReportController::class, 'create'])->name('OPDsalereport.create');
    Route::post('/OPD-sale-report', [OPDSaleReportController::class, 'store'])->name('OPDsalereport.store');
    Route::get('/OPD-sale-report/{id}/edit', [OPDSaleReportController::class, 'edit'])->name('OPDsalereport.edit');
    Route::put('/OPD-sale-report/{id}', [OPDSaleReportController::class, 'update'])->name('OPDsalereport.update');
    Route::delete('/OPD-sale-report/{id}', [OPDSaleReportController::class, 'destroy'])->name('OPDsalereport.destroy');

    //Package Sale-report
    Route::get('/package-sale-report', [PackageSaleReportController::class, 'show'])->name('packagesalereport.show');
    Route::get('/package-sale-report/create', [PackageSaleReportController::class, 'create'])->name('packagesalereport.create');
    Route::post('/package-sale-report', [PackageSaleReportController::class, 'store'])->name('packagesalereport.store');
    Route::get('/package-sale-report/{id}/edit', [PackageSaleReportController::class, 'edit'])->name('packagesalereport.edit');
    Route::put('/package-sale-report/{id}', [PackageSaleReportController::class, 'update'])->name('packagesalereport.update');
    Route::delete('/package-sale-report/{id}', [PackageSaleReportController::class, 'destroy'])->name('packagesalereport.destroy');

    //Manage Test
    Route::get('/manage-test', [ManageTestController::class, 'show'])->name('managetest.show');
    Route::get('/manage-test/create', [ManageTestController::class, 'create'])->name('managetest.create');
    Route::post('/manage-test', [ManageTestController::class, 'store'])->name('managetest.store');
    Route::get('/manage-test/{id}/edit', [ManageTestController::class, 'edit'])->name('managetest.edit');
    Route::put('/manage-test/{id}', [ManageTestController::class, 'update'])->name('managetest.update');
    Route::delete('/manage-test/{id}', [ManageTestController::class, 'destroy'])->name('managetest.destroy');

    //Test Reference
    Route::get('/test-reference', [TestReferencesController::class, 'show'])->name('testreference.show');
    Route::get('/test-reference/create', [TestReferencesController::class, 'create'])->name('testreference.create');
    Route::post('/test-reference', [TestReferencesController::class, 'store'])->name('testreference.store');
    Route::get('/test-reference/{id}/edit', [TestReferencesController::class, 'edit'])->name('testreference.edit');
    Route::put('/test-reference/{id}', [TestReferencesController::class, 'update'])->name('testreference.update');
    Route::delete('/test-reference/{id}', [TestReferencesController::class, 'destroy'])->name('testreference.destroy');

    //Examination Report
    Route::get('/examination-report', [ExaminationReportController::class, 'show'])->name('examinationreport.show');
    Route::get('/examination-report/create', [ExaminationReportController::class, 'create'])->name('examinationreport.create');
    Route::post('/examination-report', [ExaminationReportController::class, 'store'])->name('examinationreport.store');
    Route::get('/examination-report/{id}/edit', [ExaminationReportController::class, 'edit'])->name('examinationreport.edit');
    Route::put('/examination-report/{id}', [ExaminationReportController::class, 'update'])->name('examinationreport.update');
    Route::delete('/examination-report/{id}', [ExaminationReportController::class, 'destroy'])->name('examinationreport.destroy');

    //Stain Report
    Route::get('/stain-report', [StainReportController::class, 'show'])->name('stainreport.show');

    //Report
    Route::get('/report', [ReportController::class, 'show'])->name('report.show');

    //User
    Route::get('/user', [UserController::class, 'show'])->name('user.show');
});