<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function index()
    {
        return view('halaman/index');
    }
    function tentang()
    {
        return view('halaman/tentang');
    }
    function kontak()
    {
  
        $data = [
            'judul'=> 'Ini Adalah Halaman Kontak',
            'kontak' => [
                'email' => "silky.afina.saly@gmail.com",
                'linkedin' => "Silky Afina Saly"
                ]
            ];
        return view('halaman/kontak') -> with($data);
    }
}


