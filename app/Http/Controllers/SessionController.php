<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class SessionController extends Controller
{
    function index()
    {
        return view("sesi/index");
    }
    function login(Request $request)
    {
        $request -> validate([
            'email'=>'required',
            'password' => 'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);
        $infologin=[
            'email'=> $request-> email,
            'password'=>$request-> password
        ];
        if (Auth::attempt($infologin)){
            //kalau otentikasi sukses
            return redirect('Admin')->with('success','Berhasil login');
        } else {
            //kalau gagal
            return redirect('sesi')->withErrors('Email dan password yang dimasukkan tidak valid');
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('success','Berhasil logout');
    }
    function register()
    {
        return view('sesi/register');
    }
    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request -> validate([
            'name'=>'required',
            'email'=>'required|email|unique:Users',
            'password' => 'required|min:6'
        ],[
            'name.required'=>'Nama wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.email'=>'Silahkan masukkan email yang valid',
            'email.unique'=>'Email sudah pernah digunakan, silahkan pilih email yang lain',
            'password.required' => 'Password wajib diisi',
            'password.min'=>'Minimum password yang diizinkan adalah 6 karakter'
        ]);
        $data = [
            'name'=>$request-> name,
            'email'=>$request-> email,
            'password'=> Hash::make($request->password)
        ];
        User::create($data);

        $infologin=[
            'email'=> $request-> email,
            'password'=>$request-> password
        ];
        if (Auth::attempt($infologin)){
            //kalau otentikasi sukses
            return redirect('Admin')->with('success', Auth::user()->name . ' Berhasil login');
        } else {
            //kalau gagal
            return redirect('sesi')->withErrors('Email dan password yang dimasukkan tidak valid');
        }
    }
}
