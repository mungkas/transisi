<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Companies;

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
        $companies= Companies::orderBy('created_at', 'desc')->paginate(5);
        return view('companies/index', compact('companies'))
        ->with('i',(request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
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
        $request->validate([
            'name'    =>  'required',
            'email'   =>  'required',
            'logo'    =>  'required|file|max:2000'
        ]);
        
        $do = new Companies($request->all());
        $do->name = $request->get('name');
        $do->email = $request->get('email');
        if($request->hasFile('logo')){
            $do->logo = $request->logo->store('company');
        }
        
        $do->save();
        return redirect('companies')->with('success', 'Data successfully.');
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
        $companies = Companies::findOrFail($id);


        return view('companies.show', compact('companies'));
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
        $companies = Companies::find($id);
        return view('companies.edit', compact('companies'));
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
        $this->validate($request,[
            'name'    =>  'required',
            'email'   =>  'required',
            'logo'    =>  'required|file|max:2000'
        ]);

        $image_name = $request->hidden_image;
        $image = $request->file('logo');
        if($request->hasFile('logo')){
            $item->logo = $request->logo->store('company');
            }
        

        return redirect('companies')>with(['success' =>  'Berhasil Update']);
       
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
        $companies = Companies::find($id);
        $companies->delete();
        return redirect('/companies')->with(['success' =>  'Berhasil Dihapus']);
    }
}
