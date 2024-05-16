@extends('layout/aplikasi')

@section('konten')
    <form method="post" action="{{'/Admin/'.$data->kode_area}}">
        @csrf
        @method('PUT')
       <div class="mb">
        <h1>Kode Area: {{$data->kode_area}}</h1>
       </div>
        <div class="mb-3">
            <label for="nama_area" class="form-label">Nama Area</label>
            <input type="text" class="form-control" name="nama_area" id="nama_area" value="{{$data->nama_area}}">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi">{{$data->deskripsi}}</textarea>
        </div>
        <div class="mb-3">
            <label for="wilayah_id" class="form-label">Wilayah</label>
            <select class="form-control select2" style="width:100%"; name="wilayah_id" id="wilayah_id">
                <option disabled value> Pilih Wilayah </option>
                <option value="{{$data->wilayah_id}}"> {{$data->Wilayah->nama_wilayah}}</option>
                
                @foreach($wil as $item)
                <option value="{{$item->wilayah_id}}">{{$item->nama_wilayah}} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control" name="kota" id="kota" value="{{$data->kota}}">
        </div>
        <div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <input type="text" class="form-control" name="provinsi" id="provinsi" value="{{$data->provinsi}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success"> UPDATE </button>
            <a href="/Admin" class="btn btn-secondary"> KEMBALI </a>
        </div>
    </form>
@endsection
