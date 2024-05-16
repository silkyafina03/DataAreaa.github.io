<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Area</title>
    <style>
        /* Atur gaya cetak di sini */
        /* Misalnya, sembunyikan tombol cetak */
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Area</b></p>

        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>Kode Area</th>
                <th>Nama Area</th>
                <th>Deskripsi</th>
                <th>Wilayah</th>
                <th>Kota</th>
                <th>Provinsi</th>
            </tr>
            @foreach($cetak as $item)
                <tr>
                    <td>{{$item->kode_area}}</td>
                    <td>{{$item->nama_area}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td>{{$item->wilayah->nama_wilayah}}</td>
                    <td>{{$item->kota}}</td>
                    <td>{{$item->provinsi}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
    window.print();
    </script>
</body>
</html>
