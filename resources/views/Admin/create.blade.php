@extends('layout/aplikasi')

@section('konten')
    <form method="post" action="/Admin">
        @csrf
        <div class="mb-3">
          <label for="kode_area" class="form-label">Kode Area</label>
          <input type="text" class="form-control" name="kode_area"  id="kode_area" value="{{ old('kode_area') }}">
        </div>
        <div class="mb-3">
            <label for="nama_area" class="form-label">Nama Area</label>
            <input type="text" class="form-control" name="nama_area" id="nama_area" value="{{ old('nama_area') }}">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi">{{ old('deskripsi') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="wilayah_id" class="form-label">Wilayah</label>
            <select class="form-control select2" style="width:100%"; name="wilayah_id" id="wilayah_id">
                <option disabled selected> Pilih Wilayah </option>
                @foreach($wil as $item)
                <option value="{{$item->wilayah_id}}">{{$item->nama_wilayah}} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kota" class="form-label">Kota</label>
            <input type="text" class="form-control" name="kota" id="kota" value="{{ old('kota') }}">
        </div>
        <div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <input type="text" class="form-control" name="provinsi" id="provinsi" value="{{ old('provinsi') }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success"> SIMPAN </button>
            <a href="/Admin" class="btn btn-secondary"> KEMBALI </a>

        </div>

    </form>
@endsection
