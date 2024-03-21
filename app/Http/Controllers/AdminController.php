<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::all();
        $data = Admin::orderBy('kode_area','asc')->paginate(5);
        return view('Admin/index')-> with('data', $data);
    }
    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function detail($id)
    {
       
    }
    public function store(Request $request)
    {
        Session::flash('kode_area', $request->kode_area);
        Session::flash('nama_area', $request->nama_area);
        Session::flash('deskripsi', $request->deskripsi);
        Session::flash('wilayah', $request->wilayah);
        Session::flash('kota', $request->kota);
        Session::flash('provinsi', $request->provinsi);

        $request->validate([
            'kode_area'=> 'required|unique:Admin,kode_area',
            'nama_area'=> 'required',
            'deskripsi'=> 'required',
            'wilayah'=> 'required',
            'kota'=> 'required',
            'provinsi'=> 'required'
        ],[
            'kode_area.required'=>'Kode Area wajib diisi',
            'kode_area.unique'=>'Kode Area Sudah Ada, Masukkan Kode Lain',
            'nama_area.required'=>'Nama Area wajib diisi',
            'deskripsi.required'=>'Deskripsi wajib diisi',
            'wilayah.required'=>'Wilayah wajib diisi',
            'kota.required'=>'Kota Area wajib diisi',
            'provinsi.required'=>'Provinsi wajib diisi'
        ]);
        $data = [
            'kode_area' => $request->input('kode_area'),
            'nama_area' => $request->input('nama_area'),
            'deskripsi' => $request->input('deskripsi'),
            'wilayah' => $request->input('wilayah'),
            'kota' => $request->input('kota'),
            'provinsi' => $request->input('provinsi')
        ];
        Admin::create($data);
        return redirect('Admin')->with('success','Berhasil menambahkan data area');
    }
    function create(Request $request)
    {
        return view('Admin/create');
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data= Admin::where('kode_area', $id)->first();
        return view('Admin/detail')->with('data',$data);
        
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = Admin::find($id);
        return view('Admin/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_area'=> 'required',
            'deskripsi'=> 'required',
            'wilayah'=> 'required',
            'kota'=> 'required',
            'provinsi'=> 'required'
        ],[
            'nama_area.required'=>'Nama Area wajib diisi',
            'deskripsi.required'=>'Deskripsi wajib diisi',
            'wilayah.required'=>'Wilayah wajib diisi',
            'kota.required'=>'Kota Area wajib diisi',
            'provinsi.required'=>'Provinsi wajib diisi'
        ]);
        $data=[
            'nama_area'=> $request->input('nama_area'),
            'deksripsi'=> $request->input('deskripsi'),
            'wilayah'=> $request->input('wilayah'),
            'kota'=> $request->input('kota'),
            'provinsi'=> $request->input('provinsi')
        ];
        Admin::where('kode_area',$id)->update($data);
        return redirect('/Admin')->with('success','Berhasil melakukan update');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('kode_area', $id)->delete();
        return redirect('/Admin')->with('success','Berhasil hapus data');
    }
}
