<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5; // or you can use a different value for pagination
        
        if (strlen($katakunci)) {
            $data = Admin::where('kode_area', 'like', "%$katakunci%")
                ->orWhere('nama_area', 'like', "%$katakunci%")
                ->orWhere('deskripsi', 'like', "%$katakunci%")
                ->orWhere('wilayah_id', 'like', "%$katakunci%")
                ->orWhere('kota', 'like', "%$katakunci%")
                ->orWhere('provinsi', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Admin::with('wilayah')->orderBy('kode_area', 'asc')->paginate($jumlahbaris);
        }
 
        return view('Admin/index', compact('data','katakunci'))-> with('data', $data);
   
    }
    public function cetak()
    {
        $Cetak = Admin::orderBy('kode_area', 'asc')->with('wilayah')->paginate(20);
        return view('Admin/cetak')->with('cetak', $Cetak);
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
        $data = Admin::where('kode_area', $id)->first();

    if (!$data) {
        return redirect('/Admin')->with('error', 'Data tidak ditemukan.');
    }

    $wil = Wilayah::find($data->wilayah_id);

    return view('Admin.detail', compact('wil', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_area'=> 'required|unique:Admin,kode_area',
            'nama_area'=> 'required',
            'deskripsi'=> 'required',
            'wilayah_id'=> 'required',
            'kota'=> 'required',
            'provinsi'=> 'required'
        ],[
            'kode_area.required'=>'Kode Area wajib diisi',
            'kode_area.unique'=>'Kode Area Sudah Ada, Masukkan Kode Lain',
            'nama_area.required'=>'Nama Area wajib diisi',
            'deskripsi.required'=>'Deskripsi wajib diisi',
            'kota.required'=>'Kota wajib diisi',
            'provinsi.required'=>'Provinsi wajib diisi',
            'wilayah_id.required'=>'Wilayah wajib dipilih',
        ]);
        $data = [
            'kode_area' => $request->input('kode_area'),
            'nama_area' => $request->input('nama_area'),
            'deskripsi' => $request->input('deskripsi'),
            'wilayah_id' => $request->input('wilayah_id'),
            'kota' => $request->input('kota'),
            'provinsi' => $request->input('provinsi')
        ];
        Admin::create($data);
        return redirect('Admin')->with('success','Berhasil menambahkan data area');

    }
    function create(Request $request)
    {
        $wil = Wilayah::all();
        return view('Admin/create',compact('wil'));   
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Admin::where('kode_area', $id)->first();
    
        if (!$data) {
            return redirect('/Admin')->with('error', 'Data tidak ditemukan.');
        }
    
        $wil = Wilayah::find($data->wilayah_id);
    
        return view('Admin/detail', compact('wil', 'data'));
    }
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wil = Wilayah::all();
        $data = Admin::with('Wilayah')->findOrFail($id);
        return view('Admin/edit', compact('wil', 'data'));
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
            'wilayah_id'=> 'required',
            'kota'=> 'required',
            'provinsi'=> 'required'
        ],[
            'nama_area.required'=>'Nama Area wajib diisi',
            'deskripsi.required'=>'Deskripsi wajib diisi',
            'wilayah_id.required'=>'Wilayah wajib dipilih',
            'kota.required'=>'Kota Area wajib diisi',
            'provinsi.required'=>'Provinsi wajib diisi'
        ]);
        $data=[
            'nama_area'=> $request->input('nama_area'),
            'deskripsi'=> $request->input('deskripsi'),
            'wilayah_id'=> $request->input('wilayah_id'),
            'kota'=> $request->input('kota'),
            'provinsi'=> $request->input('provinsi')
        ];
        Admin::where('kode_area',$id)->update($data);
        return redirect('Admin')->with('success','Berhasil melakukan update');
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
