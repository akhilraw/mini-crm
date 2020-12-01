<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::with('company')->get();
        if ($employees->isEmpty())
        {
            return redirect('/');
        }
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $employee = new employee();
        $employee->firstname    = $request->firstname ?? '';
        $employee->lastname     = $request->lastname ?? '';
        $employee->email        = $request->email ?? '';
        $employee->company_id   = $request->company_id ?? '';
        $employee->phone        = $request->phone ?? '';

        if ($employee->save()) {
            return redirect()->route('employees.index')->withFlashSuccess(__('New employee has been added successfully'));
        } else {
            return redirect()->route('employees.index')->withFlashDanger(__('An error occured. Try again'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $show = Employee::with('company')->where('id', $id)->first();
        if($show)
        {
          return view('employee.show', compact('show'));
        }
        else {
          return response()->json(['status'=>'false', 'message'=>'Oops! Something Went Wrong']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $companies = Company::all();
        $employee = Employee::with('company')->where('id', $id)->first();
        if($employee)
        {
          return view('employee.edit', compact('employee', 'companies'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $employee = employee::where('id', $id)->first();
        $employee->firstname    = $request->firstname;
        $employee->lastname     = $request->lastname;
        $employee->email        = $request->email;
        $employee->company_id   = $request->company_id;
        $employee->phone        = $request->phone;

        if ($employee->update()) {
            return redirect()->route('employees.index')->withFlashSuccess(__('employee has been updated successfully'));
        } else {
            return redirect()->route('employees.index')->withFlashDanger(__('An error occured. Try again'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = employee::destroy($id);
        if($destroy)
        {
          return redirect('/employees');
        }
    }
}
