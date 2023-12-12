<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $companies = Company::simplePaginate(10);;
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        $company = new Company;
        $company->name = $request->name;
        $company->website = $request->website;
        $company->email = $request->email;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public');
            $company->logo = Storage::url($logoPath);
        }

        $company->save();

        return redirect()->route('companies.index')->with('status', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
        $request->validate([
            'name' => 'required',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        $company->name = !empty($request->name) ? $request->name : $company->name;
        $company->website = $request->website ? $request->website : $company->website;
        $company->email = $request->email ? $request->email : $company->email;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public');
            $company->logo = Storage::url($logoPath);
        }else{
            $company->logo = $company->logo;
        }

        $company->update();

        return redirect()->route('companies.index')->with('status', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
        $company->delete();

        return redirect()->route('companies.index')->with('status', 'Company deleted successfully');

    }
}
