<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

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
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Obrigatória no cadastro
            'instagram_url' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('employees', 'public');
        }

        Employee::create($data);

        return redirect()->route('admin.employees.index')->with('success', 'Profissional adicionado!');
    }

    public function show(Employee $employee)
    {
        return view('admin.employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:employees,email,' . $id,
            'role' => 'required|string|max:255',
            'bio' => 'required|string',
            'specialties' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
            'instagram_url' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('employees', 'public');
        } else {
            unset($data['image_path']);
        }

        $employee->update($data);

        return redirect()->route('admin.employees.index')->with('success', 'Profissional atualizado com sucesso!');
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        if($employee->image_path){
            Storage::disk('public')->delete($employee->image_path);
        }
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Profissional excluído com sucesso!');
    }
}
