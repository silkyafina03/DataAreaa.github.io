@extends('layout/aplikasi')

@section('konten')
<div>
    <h1>{{$data->kode_area}}</h1>
    <p>
        <b>Nama Area: </b>{{$data->nama_area}}
    </p>
    <p>
        <b>Deskripsi: </b>{{$data->deskripsi}}
    </p>
    <p>
        <b>Wilayah: </b>{{$wil->nama_wilayah}}
    </p>
    <p>
        <b>Kota: </b>{{$data->kota}}
    </p>
    <p>
        <b>Provinsi: </b>{{$data->provinsi}}
    </p>
   </div>
   <div class="mb-3">
    <a href="/Admin" class="btn btn-secondary"> KEMBALI </a>

</div>
@endsection
