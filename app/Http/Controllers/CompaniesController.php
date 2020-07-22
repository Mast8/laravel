<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if( Auth::check() ){


            $companies = Company::where('user_id', Auth::user()->id)->get();

             return view('companias.index', ['companies'=> $companies]);  
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companias.create');
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

        if(Auth::check()){
            $company = Company::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id
            ]);


            if($company){
                return redirect()->route('companias.show', ['company'=> $company->id])
                ->with('success' , 'Company created successfully');
            }

        }
        
            return back()->withInput()->with('errors', 'Error creating new company');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
       // $company = Company::where('id', $company->id )->first();
        $company = Company::find($id);

        return view('companias.show', compact ('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        
        return view('companias.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
      //save data
      //dd($request->input('name'));
      $company = Company::find( $request->input('id_compania'));
      $companyUpdate = Company::where('id', $request->input('id_compania'))
                                ->update([
                                        'name'=> $request->input('name'),
                                        'description'=> $request->input('description')
                                ]);

      if($companyUpdate){
          return redirect()->route('companias.show', ['company'=> $company->id])
          ->with('success' , 'Company updated successfully');
      }
      //redirect
      return back()->withInput();


      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //

        $findCompany = Company::find( $company->id);
		if($findCompany->delete()){
            
            //redirect
            return redirect()->route('companias.index')
            ->with('success' , 'Company deleted successfully');
        }

        return back()->withInput()->with('error' , 'Company could not be deleted');
        

    }
}
