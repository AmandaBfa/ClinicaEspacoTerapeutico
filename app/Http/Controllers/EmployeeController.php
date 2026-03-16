<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
     public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    public function indexPublic()
    {
        $employees = Employee::all();
        return view('about', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:employees,email',
            'role' => 'required|string|max:255',
            'bio' => 'required|string',
            'specialties' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'instagram_url' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
        ]);
        
        $data = $request->all();

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('employees', 'public');
            $data['image_path'] = $path;
        }

        Employee::create($data);

        return redirect()->route('admin.employees.index')->with('success', 'Profissional adicionado!');
    }

    public function show(Employee $employee)
    {
        return view('admin.employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('admin.employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('admin.employees.index');
    }
}
