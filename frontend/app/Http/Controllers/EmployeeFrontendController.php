<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeeFrontendController extends Controller
{
    public function index()
    {
        $response = Http::get(env('BACKEND_API').'/employee');
        $employees = $response->json()['data']['data'] ?? [];
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Http::get(env('BACKEND_API').'/departments')->json()['data']['data'] ?? [];
        return view('employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        Http::post(env('BACKEND_API').'/employee', $request->all());
        return redirect()->route('employees.index');
    }

    public function edit($id)
    {
        $employee = Http::get(env('BACKEND_API').'/employee/'.$id)->json()['data'] ?? null;
        $departments = Http::get(env('BACKEND_API').'/departments')->json()['data']['data'] ?? [];
        return view('employees.edit', compact('employee','departments'));
    }

    public function update(Request $request, $id)
    {
        Http::put(env('BACKEND_API').'/employee/'.$id, $request->all());
        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        Http::delete(env('BACKEND_API').'/employee/'.$id);
        return redirect()->route('employees.index');
    }
}
