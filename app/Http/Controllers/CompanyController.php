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
            return redirect('/');
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
            return redirect()->route('companies.index')->withFlashSuccess(__('New company has been added successfully'));
        } else {
            return redirect()->route('companies.index')->withFlashDanger(__('An error occured. Try again'));
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
            return redirect()->route('companies.index')->withFlashSuccess(__('company has been updated successfully'));
        } else {
            return redirect()->route('companies.index')->withFlashDanger(__('An error occured. Try again'));
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
          return redirect('/companies');
        }
    }
}
