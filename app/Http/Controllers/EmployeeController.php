<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        $roles = Role::all();
        return view('employee.create', compact('departements', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone_number' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'birth_date' => 'required|date',
            'hire_date' => 'required|date',
            'departement_id' => 'required|exists:departements,id',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|in:active,inactive',
            'salary' => 'required|numeric|min:0'
        ]);
        
        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $departements = Departement::all();
        $roles = Role::all();
        $employee = Employee::find($id);
        return view('employee.edit', compact('departements', 'roles', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        // Validate the request data
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone_number' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'birth_date' => 'required|date',
            'hire_date' => 'required|date',
            'departement_id' => 'required|exists:departements,id',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|in:active,inactive',
            'salary' => 'required|numeric|min:0'
        ]);

        // Update the employee record
        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
  
}
