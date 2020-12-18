<?php

namespace App\Http\Controllers;

use App\Companies;
use App\Employee;
use App\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $datas = Employees::where('user_id', $user->id)->get();
        return view('pages.employees.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $companies = Companies::where('user_id', $user->id)->get();
        return view('pages.employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Employees();
         $data->user_id = Auth::user()->id;
         $data->company_id = $request->company_id;
         $data->name = $request->name;
         $data->email = $request->email;
         $data->address = $request->address;
         $data->save();

         return redirect()->route('employees.index')->with('create', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Employees::find($id);
        $companies = Companies::where('user_id', Auth::user()->id)->get();
        return view('pages.employees.edit', compact('data', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Employees::find($id);
         $data->user_id = Auth::user()->id;
         $data->company_id = $request->company_id;
         $data->name = $request->name;
         $data->email = $request->email;
         $data->address = $request->address;
         $data->update();

         return redirect()->route('employees.index')->with('update', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Employees::find($id);
        $data->delete();
        return redirect()->route('employees.index')->with('delete', 'Berhasil Menghapus Data');
    }
}
