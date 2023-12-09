<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['employees'] = Employee::with('company')->paginate(10);
        if ($request->ajax()) {
            return view('actions.employee.view', $data);
        }
        return view('employee', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['companies'] = Company::all();
        return view('employee', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // print_r($request->all());

        // exit;

      
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
              'email' => 'unique:employees'
        ],[
            'required' => 'This field is required'
        ]);

       

        Employee::create($request->all());

        return redirect()->route('employee.index')->with('message', 'Employee added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['edit'] = Employee::find($id);
        $data['companies'] = Company::all();
        return view('employee', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => ['required', 'unique:employees,email,'. $id]
        ], [
            'required' => 'This field is required'
        ]);

        Employee::where('id', $id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('employee.index')->with('message', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Employee::find($id)->delete();


        return response()->json(['code' => 200, 'success' => 'Deleted Successfully'], 200);


    }
}
