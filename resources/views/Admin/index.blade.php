@extends('layout/aplikasi')
@section('konten')
    <a href="/Admin/create" class="btn btn-primary">+Tambah Data Area</a>
    <table class="table">
        <thead>
            <tr>
                <th> Kode Area </th>
                <th> Nama Area </th>
                <th> Deskripsi </th>
                <th> Wilayah </th>
                <th> Kota </th>
                <th> Provinsi </th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->kode_area}}</td>
                    <td>{{$item->nama_area}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td>{{$item->wilayah}}</td>
                    <td>{{$item->kota}}</td>
                    <td>{{$item->provinsi}}</td>
                    <td> 
                        <a class="btn btn-secondary btn-sm" href="{{url('/Admin/'.$item->kode_area)}}">Detail</a>

                        <a class="btn btn-warning btn-sm" href="{{url('/Admin/'.$item->id.'/edit')}}">Edit</a>

                        <form onsubmit="return confirm('Yakin untuk hapus data?')" class="d-inline" action="{{url('/Admin/'.$item->kode_area)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
@endsection