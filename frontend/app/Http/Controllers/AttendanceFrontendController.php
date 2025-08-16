<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AttendanceFrontendController extends Controller
{

   public function index(Request $request)
{
    $params = $request->only(['date_from','date_to','department_id']);
    $response = Http::get(env('BACKEND_API').'/attendance-logs', $params);
    $logs = $response->json()['data'] ?? [];

    return view('attendance.index', compact('logs'));
}


    public function logs(Request $request)
    {
        $params = $request->only(['date_from','date_to','department_id']);
        $response = Http::get(env('BACKEND_API').'/attendance/logs', $params);
        $logs = $response->json()['data'] ?? [];
        return view('attendance.logs', compact('logs'));
    }

    public function checkIn(Request $request)
    {
        Http::post(env('BACKEND_API').'/attendance/check-in', [
            'employee_id' => $request->employee_id
        ]);
        return redirect()->route('attendance.index');
    }

    public function checkOut(Request $request)
    {
        Http::post(env('BACKEND_API').'/attendance/check-out', [
            'employee_id' => $request->employee_id
        ]);
        return redirect()->route('attendance.index');
    }
}
