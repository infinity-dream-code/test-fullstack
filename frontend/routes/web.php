<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentFrontendController;
use App\Http\Controllers\EmployeeFrontendController;
use App\Http\Controllers\AttendanceFrontendController;

Route::get('/', function () {
    return redirect()->route('departments.index');
});

Route::get('/departments', [DepartmentFrontendController::class, 'index'])->name('departments.index');
Route::get('/departments/create', [DepartmentFrontendController::class, 'create'])->name('departments.create');
Route::post('/departments', [DepartmentFrontendController::class, 'store'])->name('departments.store');
Route::get('/departments/{id}/edit', [DepartmentFrontendController::class, 'edit'])->name('departments.edit');
Route::put('/departments/{id}', [DepartmentFrontendController::class, 'update'])->name('departments.update');
Route::delete('/departments/{id}', [DepartmentFrontendController::class, 'destroy'])->name('departments.destroy');

Route::get('/employees', [EmployeeFrontendController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeFrontendController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeFrontendController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}/edit', [EmployeeFrontendController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [EmployeeFrontendController::class, 'update'])->name('employees.update');
Route::delete('/employees/{id}', [EmployeeFrontendController::class, 'destroy'])->name('employees.destroy');

Route::get('attendance', [AttendanceFrontendController::class, 'index'])->name('attendance.index');
Route::post('/attendance/check-in', [AttendanceFrontendController::class, 'checkIn'])->name('attendance.checkin');
Route::post('/attendance/check-out', [AttendanceFrontendController::class, 'checkOut'])->name('attendance.checkout');
