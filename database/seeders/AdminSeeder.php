<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run(): void
    {
        DB::table('admin')->insert([
            'kode_area'=>'CA01',
            'nama_area'=>'Jawa',
            'deskripsi'=>'Semua wilayah yang ada di Pulau Jawa',
            'wilayah'=>'Gunung Pati',
            'kota'=>'Semarang',
            'Provinsi'=>'Jawa Tengah',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('admin')->insert([
            'kode_area'=>'CA02',
            'nama_area'=>'Sumatra',
            'deskripsi'=>'Semua wilayah yang ada di Pulau Sumatra',
            'wilayah'=>'Johor',
            'kota'=>'Medan',
            'Provinsi'=>'Sumatra Utara',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('admin')->insert([
            'kode_area'=>'CA03',
            'nama_area'=>'Kalimantan',
            'deskripsi'=>'Semua wilayah yang ada di Pulau Kalimantan',
            'wilayah'=>'Gunung Paikat',
            'kota'=>'Banjar Baru',
            'Provinsi'=>'Kalimantan Selatan',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
