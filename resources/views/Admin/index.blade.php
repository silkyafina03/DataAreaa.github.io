@extends('layout/aplikasi')
@section('konten')
<div class="pb-3">
    <form class="d-flex" action="{{ url('Admin') }}" method="get">
        <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
        <button class="btn btn-secondary" type="submit">Cari</button>
    </form>
</div>
    <a href="/Admin/create" class="btn btn-primary">Data Area <i class="fa-solid fa-plus"></i></a>  
    <a class="btn btn-success" href="/Admin/cetak"> Cetak Data <i class="fa-solid fa-print"></i></a>
    <table class="table" >
        <thead>
            <tr>
                <th> Kode Area </th>
                <th> Nama Area </th>
                <th> Deskripsi </th>
                <th> Wilayah </th>
                <th> Kota </th>
                <th> Provinsi </th>
                <th> Aksi </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->kode_area}}</td>
                    <td>{{$item->nama_area}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td>{{$item->wilayah->nama_wilayah}}</td>
                    <td>{{$item->kota}}</td>
                    <td>{{$item->provinsi}}</td>
                    <td> 
                        
                        <a class="btn btn-info btn-sm" href="{{route('detail', $item->kode_area)}}"><i class="fa-solid fa-circle-info"></i></a>

                        <a class="btn btn-warning btn-sm" href="{{url('/Admin/'.$item->kode_area.'/edit')}}"><i class="fa-solid fa-pencil"></i></a>

                        <form onsubmit="return confirm('Yakin untuk hapus data?')" class="d-inline" action="{{url('/Admin/'.$item->kode_area)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->links()}}
@endsection
