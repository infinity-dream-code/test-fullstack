<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DepartmentFrontendController extends Controller
{
    public function index()
    {
        $response = Http::get(env('BACKEND_API').'/departments');
        $departments = $response->json()['data']['data'] ?? [];
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        Http::post(env('BACKEND_API').'/departments', $request->all());
        return redirect()->route('departments.index');
    }

    public function edit($id)
    {
        $response = Http::get(env('BACKEND_API').'/departments/'.$id);
        $department = $response->json()['data'] ?? null;
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        Http::put(env('BACKEND_API').'/departments/'.$id, $request->all());
        return redirect()->route('departments.index');
    }

    public function destroy($id)
    {
        Http::delete(env('BACKEND_API').'/departments/'.$id);
        return redirect()->route('departments.index');
    }
}
