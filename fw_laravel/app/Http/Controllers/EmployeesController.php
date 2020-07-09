<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\Companies;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees= Employees::orderBy('created_at', 'desc')->paginate(5);
        return view('employees/index', compact('employees'))
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
        $companies = Companies::all();
        return view('employees.create', [
            'companies' => $companies
        ]);
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
            'companies_id' => 'numeric',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);

        $item = new Employees;
        $item->name = $request->name;
        $item->email = $request->email;
        $item->companies_id = $request->companies_id;

        $item->save();
        return redirect('employees')->with('success', 'Data successfully.');
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
        $employees = Employees::findOrFail($id);


        return view('employees.show', compact('employees'));
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
        $companies = Companies::all();
        $employees = Employees::find($id);
        return view('employees.edit', compact('companies'), compact('employees'));
        
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
        $request->validate([
            'companies_id' => 'numeric',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $employees=Employees::find($id);
        $employeesupdate=$request->all();
        $employees->update($employeesupdate);
        
        return redirect('employees')->with('success', 'Update successfully.');   
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
        $employees = Employees::find($id);
        $employees->delete();
        return redirect('/employees')->with(['success' =>  'Berhasil Dihapus']);
    }
}
