@extends('layout/aplikasi')

@section('konten')
<div>
    <a href="/Admin" class="btn btn-secondary"> KEMBALI </a>
    <h1>{{$data->kode_area}}</h1>
    <p>
        <b>Nama Area: </b>{{$data->nama_area}}
    </p>
    <p>
        <b>Deskripsi: </b>{{$data->deskripsi}}
    </p>
    <p>
        <b>Wilayah: </b>{{$data->wilayah}}
    </p>
    <p>
        <b>Kota: </b>{{$data->kota}}
    </p>
    <p>
        <b>Provinsi: </b>{{$data->provinsi}}
    </p>
   </div>
@endsection