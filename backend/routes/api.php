<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\AttendanceController;

Route::apiResource('departments', DepartmentController::class);
Route::apiResource('employee', EmployeeController::class);
Route::post('attendance/check-in', [AttendanceController::class, 'checkIn']);
Route::post('attendance/check-out', [AttendanceController::class, 'checkOut']);
Route::get('attendance-logs', [AttendanceController::class, 'logs']);


