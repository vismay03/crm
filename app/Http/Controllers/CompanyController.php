<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['companies'] = Company::paginate(1);

        if($request->ajax()) {
            return view('actions.company.view', $data);
        }

        return view('company', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('company');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'dimensions:max_width=100,max_height=100',
            'email' => 'unique:companies'
        ], [
            'image' => 'logo should be in 100x100 dimensions',

            'required' => 'This field is required'
        ]);
        $name = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();

            Storage::disk('local')->put('public/'. $name, file_get_contents($image) );
        }

        



        Company::create([
            'name' => $request->name,
            'logo' => $name,
            'email'=> $request->email,
            'website'=> $request->website
        ]);

        return redirect()->route('company.index')->with('message', 'Company added successfully');
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
        $data['edit'] = Company::find($id);

        return view('company', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'dimensions:max_width=100,max_height=100',
            'email' => 'unique:companies,email,'. $company->id
        ], [
            'image' => 'logo should be in 100x100 dimensions',

            'required' => 'This field is required'
        ]);
        $name = null;

      $data =  array(
            'name' => $request->name,
           
            'email' => $request->email,
            'website' => $request->website
      );


        if ($image = $request->file('image')) {
            // echo "in";
            // exit;
            File::delete(public_path('storage/' . $company->logo));

            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();

            Storage::disk('local')->put('public/' . $name, file_get_contents($image));

            $data['logo'] = $name;
        }

        Company::where('id', $company->id)->update($data);

        return redirect()->route('company.index')->with('message', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {




        try {

            $company = Company::find($id);
           
            File::delete(public_path('storage/'.$company->logo));
            // echo "ds";
            // exit;
            $company->delete();


            return response()->json(['code' => 200, 'success' => 'Deleted Successfully'], 200);



        } catch (Exception $e) {

            if ($e->getCode() == 23000) {
                return response()->json(['code' => 300, 'success' => 'Sorry, Can\'t delete already have used this somewhere'], 200);
            }
        }
    }
}
