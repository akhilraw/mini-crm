<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Requests\StoreCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::all();
        if ($companies->isEmpty())
        {
            alert()->message('No data found', 'Sorry!');
            return redirect()->route('home');
        }
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        //
        $company = new Company();

        $company->name    = $request->name;
        $company->email   = $request->email;
        $company->website = $request->website ?? '';

        if($request->file('logo'))
        {
            $file           = $request->file('logo');
            $filename       = $file->getClientOriginalName();
            $company->logo  = $file->storeAs('public', $filename);
        }

        if ($company->save()) {
            alert()->success('Company Stored successfully', 'Success!');
            return redirect()->route('companies.index');
        } else {
            alert()->error('Company not saved', 'Failure!');
            return redirect()->route('companies.index');
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
        $show = Company::findOrFail($id);
        if($show)
        {
          return view('company.show', compact('show'));
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
        $company = Company::find($id);
        if($company)
        {
          return view('company.edit', compact('company'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompanyRequest $request, $id)
    {
        //
        $company = Company::where('id', $id)->first();
        $company->name    = $request->name;
        $company->email   = $request->email;
        $company->website = $request->website ?? '';

        if($request->file('logo'))
        {
            $file           = $request->file('logo');
            $filename       = $file->getClientOriginalName();
            $company->logo  = $file->storeAs('public', $filename);
        }

        if ($company->update()) {
            alert()->success('Company updated successfully', 'Success!');
            return redirect()->route('companies.index');
        } else {
            alert()->error('Company update failed', 'Failure!');
            return redirect()->route('companies.index');
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
        $destroy = Company::destroy($id);
        if($destroy)
        {
          alert()->success('Company deleted successfully', 'Success!');
          return redirect()->route('companies.index');
        }
    }
}
