<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BillPaymentController;
use App\Http\Controllers\RevenueReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Authentication Routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/signIn', [LoginController::class, 'login'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    
    

    Route::get('/dashboard', [RevenueReportController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/generate', [RevenueReportController::class, 'generateReport'])->name('revenue-reports.generate');

    // User Routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    
    // Patients Routes
    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
    Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');
    Route::get('/patients/create/d', [PatientController::class, 'create'])->name('patients.create');
    Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
    Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
    Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');
    Route::get('/patients/search', [PatientController::class, 'search'])->name('patients.search');
    
    // Prescriptions Routes
    Route::get('/prescriptions', [PrescriptionController::class, 'index'])->name('prescriptions.index');
    Route::get('/prescriptions/{id}', [PrescriptionController::class, 'show'])->name('prescriptions.show');
    Route::get('/prescriptions/create/p', [PrescriptionController::class, 'create'])->name('prescriptions.create');
    Route::post('/prescriptions', [PrescriptionController::class, 'store'])->name('prescriptions.store');
    Route::get('/prescriptions/{id}/edit', [PrescriptionController::class, 'edit'])->name('prescriptions.edit');
    Route::put('/prescriptions/{id}', [PrescriptionController::class, 'update'])->name('prescriptions.update');
    Route::delete('/prescriptions/{id}', [PrescriptionController::class, 'destroy'])->name('prescriptions.destroy');
    
    // Bill Payments Routes
    Route::get('/bill-payments', [BillPaymentController::class, 'index'])->name('bill-payments.index');
    Route::get('/bill-payments/{id}', [BillPaymentController::class, 'show'])->name('bill-payments.show');
    Route::get('/bill-payments/create/p', [BillPaymentController::class, 'create'])->name('bill-payments.create');
    Route::post('/bill-payments', [BillPaymentController::class, 'store'])->name('bill-payments.store');
    Route::get('/bill-payments/{billPayment}/edit', [BillPaymentController::class, 'edit'])->name('bill-payments.edit');
    Route::put('/bill-payments/{billPayment}', [BillPaymentController::class, 'update'])->name('bill-payments.update');
    
});

// Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');