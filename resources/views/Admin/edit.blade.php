@extends('layout/aplikasi')

@section('konten')
    <a href="/Admin" class="btn btn-secondary"> KEMBALI </a>
    <form method="post" action="{{'/Admin/'.$data->id}}">
        @csrf
        @method('put')
       <div class="mb">
        <h1>Kode Area: {{$data->kode_area}}</h1>
       </div>
        <div class="mb-3">
            <label for="nama_area" class="form-label">Nama Area</label>
            <input type="text" class="form-control" name="nama_area" id="nama_area" value="{{$data->nama_akses}}">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi">{{$data->deskripsi}}</textarea>
        </div>
        <div class="mb-3">
            <label for="wilayah" class="form-label">Wilayah</label>
            <input type="text" class="form-control" name="wilayah" id="wilayah" {{$data->wilayah}}>
        </div>
        <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control" name="kota" id="kota" {{$data->kota}}>
        </div>
        <div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <input type="text" class="form-control" name="provinsi" id="provinsi" {{$data->provinsi}}>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary"> UPDATE </button>
        </div>
    </form>
@endsection