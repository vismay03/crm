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
        $data['companies'] = Company::paginate(10);
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

           

            // $request->validate([
            //     ,
            // ]);

          

            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            
            Storage::disk('local')->put('public/'. $name, file_get_contents($image) );

            // $request->image->move(public_path('images'), $name);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
