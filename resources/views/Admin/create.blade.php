@extends('layout/aplikasi')

@section('konten')
    <form method="post" action="/Admin">
        @csrf
        <div class="mb-3">
          <label for="kode_area" class="form-label">Kode Area</label>
          <input type="text" class="form-control" name="kode_area"  id="kode_area" value="{{Session::get('kode_akses')}}">
        </div>
        <div class="mb-3">
            <label for="nama_area" class="form-label">Nama Area</label>
            <input type="text" class="form-control" name="nama_area" id="nama_area" value="{{Session::get('nama_akses')}}">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi"> {{Session::get('deskripsi')}}</textarea>
        </div>
        <div class="mb-3">
            <label for="wilayah" class="form-label">Wilayah</label>
            <input type="text" class="form-control" name="wilayah" id="wilayah" {{Session::get('wilayah')}}>
        </div>
        <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control" name="kota" id="kota" {{Session::get('kota')}}>
        </div>
        <div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <input type="text" class="form-control" name="provinsi" id="provinsi" {{Session::get('provinsi')}}>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary"> SIMPAN </button>
        </div>
    </form>
@endsection