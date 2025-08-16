<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DepartmentController extends Controller
{
    public function index()
    {
        try {
            $departments = Department::paginate(10);
            return response()->json([
                'status' => 200,
                'message' => 'List of departments retrieved successfully',
                'data' => $departments
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching departments: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to fetch departments'
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'department_name' => 'required|string|max:255',
            'max_clock_in_time' => 'required|date_format:H:i',
            'max_clock_out_time' => 'required|date_format:H:i',
        ]);

        try {
            $department = Department::create($validated);
            return response()->json([
                'status' => 201,
                'message' => 'Department created successfully',
                'data' => $department
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error creating department: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to create department'
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $department = Department::findOrFail($id);
            return response()->json([
                'status' => 200,
                'message' => 'Department retrieved successfully',
                'data' => $department
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 404,
                'message' => 'Department not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error fetching department: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to fetch department'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'department_name' => 'required|string|max:255',
            'max_clock_in_time' => 'required|date_format:H:i',
            'max_clock_out_time' => 'required|date_format:H:i',
        ]);

        try {
            $department = Department::findOrFail($id);
            $department->update($validated);
            return response()->json([
                'status' => 200,
                'message' => 'Department updated successfully',
                'data' => $department
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 404,
                'message' => 'Department not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error updating department: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to update department'
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $department = Department::findOrFail($id);
            $department->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Department deleted successfully'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 404,
                'message' => 'Department not found'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Error deleting department: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Failed to delete department'
            ], 500);
        }
    }
}
