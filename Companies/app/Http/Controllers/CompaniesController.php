<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $user = Auth::user();
        $datas = Companies::where('user_id', $user->id)->get();
        return view('pages.companies.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= [
            'name' => 'required',
            'website' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required|numeric|digits_between:11,13|regex:/(08)[0-9]{9}/',
            'logo' => 'required|file|image|mimes:png|max:2048',
            'address' => 'required',
         ];

         $message = [
            'required|file|image|mimes:jpg,png,jpeg|max:2048' => ':attribute tidak boleh kosong',
            'mimes' => 'File Logo harus .PNG',
            'email' => 'Masukkan Email dengan benar: example@gmail.com',
             'required'  => ':tidak boleh kosong',
             'digits_between' => ':attribute setidaknya :min sampai :max karakter',
             'numeric'   => ':attribute hanya boleh angka',
             'regex' => ':attribute harus sesuai format 08xx-xxxx-xxxx',

         ];

         $this->validate($request, $rules, $message);

        $image=$request->file('logo');
        $filename=time().'.'.$image->getClientOriginalExtension();
        $path=public_path('storage/app/company');
        $image->move($path,$filename);

         $data = new Companies();
         $data->user_id = Auth::user()->id;
         $data->name = $request->name;
         $data->website = $request->website;
         $data->email = $request->email;
         $data->no_telp = $request->no_telp;
         $data->logo = $filename;
         $data->address = $request->address;
         $data->save();

         return redirect()->route('companies.index')->with('create', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Companies::find($id);
        return view('pages.companies.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules= [
            'name' => 'required',
            'website' => 'required',
            'email' => 'required',
            'no_telp' => 'required|numeric|digits_between:11,13|regex:/(08)[0-9]{9}/',
            'logo' => 'required|file|image|mimes:png|max:2048',
            'address' => 'required',
         ];

         $message = [
            'required|file|image|mimes:jpg,png,jpeg|max:2048' => ':attribute tidak boleh kosong',
            'mimes' => 'File Logo harus .PNG',
             'required'  => ':tidak boleh kosong',
             'digits_between' => ':attribute setidaknya :min sampai :max karakter',
             'numeric'   => ':attribute hanya boleh angka',
             'regex' => ':attribute harus sesuai format 08xx-xxxx-xxxx',

         ];

         $this->validate($request, $rules, $message);

         $data = Companies::find($id);
         $data->user_id = Auth::user()->id;
         $data->name = $request->name;
         $data->website = $request->website;
         $data->email = $request->email;
         $data->no_telp = $request->no_telp;
         $data->address = $request->address;
         $image=$request->file('logo');
        if ($image==''){
            $data->logo= $request->old_logo;
        }else{
            $filename=time().'.'.$image->getClientOriginalExtension();
            $path=public_path('storage/app/company');
            $image->move($path, $filename);
            $data->logo = $filename;
        }


         $data->update();

         return redirect()->route('companies.index')->with('update', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Companies::find($id);
        $data->delete();
        return redirect()->route('companies.index')->with('delete', 'Berhasil Menghapus Data');
    }
}
