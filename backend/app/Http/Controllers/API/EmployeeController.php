<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeController extends Controller
{
    public function index()
    {
        try {
            $employees = Employee::with('department')->paginate(10);
            return response()->json([
                'status' => 200,
                'message' => 'List of employees retrieved successfully',
                'data' => $employees
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching employees: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to fetch employees'
            ], 500);
        }
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'department_id' => 'required|exists:departments,id',
        'name' => 'required|string|max:255',
        'address' => 'nullable|string',
    ]);

    try {
        $lastEmployee = Employee::orderBy('id', 'desc')->first();
        if ($lastEmployee) {
            $lastNumber = (int) substr($lastEmployee->employee_id, 3);
            $newId = 'EMP' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newId = 'EMP001';
        }

        $validated['employee_id'] = $newId;

        $employee = Employee::create($validated)->load('department');

        return response()->json([
            'status' => 201,
            'message' => 'Employee created successfully',
            'data' => $employee
        ], 201);
    } catch (\Exception $e) {
        Log::error('Error creating employee: ' . $e->getMessage());
        return response()->json([
            'status' => 500,
            'message' => 'Failed to create employee'
        ], 500);
    }
}


    public function show($id)
    {
        try {
            $employee = Employee::with('department')->findOrFail($id);
            return response()->json([
                'status' => 200,
                'message' => 'Employee retrieved successfully',
                'data' => $employee
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 404,
                'message' => 'Employee not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching employee: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to fetch employee'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'employee_id' => 'required|string|max:50|unique:employees,employee_id,' . $id,
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
        ]);

        try {
            $employee = Employee::findOrFail($id);
            $employee->update($validated);
            $employee->load('department');
            return response()->json([
                'status' => 200,
                'message' => 'Employee updated successfully',
                'data' => $employee
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 404,
                'message' => 'Employee not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error updating employee: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to update employee'
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Employee deleted successfully'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 404,
                'message' => 'Employee not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error deleting employee: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to delete employee'
            ], 500);
        }
    }
}
