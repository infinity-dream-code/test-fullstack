<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\Controller;
use App\Models\Attendance;
use App\Models\AttendanceHistory;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AttendanceController extends Controller
{
    public function checkIn(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|string|exists:employees,employee_id'
        ]);

        try {
            $today = now()->startOfDay();
            $exists = Attendance::where('employee_id', $validated['employee_id'])
                ->whereDate('created_at', $today)
                ->exists();
            if ($exists) {
                return response()->json([
                    'status' => 409,
                    'message' => 'Already checked in today'
                ], 409);
            }
            $attendance = Attendance::create([
                'employee_id' => $validated['employee_id'],
                'attendance_id' => (string) Str::uuid(),
                'clock_in' => now()
            ]);
            AttendanceHistory::create([
                'employee_id' => $validated['employee_id'],
                'attendance_id' => $attendance->attendance_id,
                'date_attendance' => now(),
                'attendance_type' => 1,
                'description' => 'Check-in'
            ]);
            return response()->json([
                'status' => 201,
                'message' => 'Check-in successful',
                'data' => $attendance
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error check-in: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to check-in'
            ], 500);
        }
    }

    public function checkOut(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|string|exists:employees,employee_id'
        ]);

        try {
            $today = now()->startOfDay();
            $attendance = Attendance::where('employee_id', $validated['employee_id'])
                ->whereDate('created_at', $today)
                ->whereNull('clock_out')
                ->first();
            if (!$attendance) {
                return response()->json([
                    'status' => 404,
                    'message' => 'No active check-in found for today'
                ], 404);
            }
            $attendance->update(['clock_out' => now()]);
            AttendanceHistory::create([
                'employee_id' => $validated['employee_id'],
                'attendance_id' => $attendance->attendance_id,
                'date_attendance' => now(),
                'attendance_type' => 2,
                'description' => 'Check-out'
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Check-out successful',
                'data' => $attendance
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error check-out: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to check-out'
            ], 500);
        }
    }

    public function logs(Request $request)
    {
        try {
            $query = Attendance::with(['employee.department']);
            if ($request->has('date_from')) {
                $query->whereDate('created_at', '>=', $request->date_from);
            }
            if ($request->has('date_to')) {
                $query->whereDate('created_at', '<=', $request->date_to);
            }
            if ($request->has('department_id')) {
                $query->whereHas('employee', function ($q) use ($request) {
                    $q->where('department_id', $request->department_id);
                });
            }
           $logs = $query->get()->map(function ($row) {
    $in = $row->clock_in ? Carbon::parse($row->clock_in)->format('H:i:s') : null;
    $out = $row->clock_out ? Carbon::parse($row->clock_out)->format('H:i:s') : null;
    $maxIn = $row->employee->department->max_clock_in_time;
    $maxOut = $row->employee->department->max_clock_out_time;
    return [
        'employee_id' => $row->employee_id,
        'name' => $row->employee->name,
        'department' => $row->employee->department->department_name,
        'date' => Carbon::parse($row->created_at)->toDateString(),
        'clock_in' => $in,
        'clock_out' => $out,
        'status_in' => $in ? ($in <= $maxIn ? 'on_time' : 'late') : 'no_checkin',
        'status_out' => $out ? ($out >= $maxOut ? 'ok' : 'early_leave') : 'no_checkout'
    ];
});
            return response()->json([
                'status' => 200,
                'message' => 'Attendance logs retrieved successfully',
                'data' => $logs
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching attendance logs: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to fetch attendance logs'
            ], 500);
        }
    }
}
