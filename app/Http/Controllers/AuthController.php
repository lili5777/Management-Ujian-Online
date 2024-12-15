<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        // kita ambil data user lalu simpan pada variable $user
        $user = Auth::user();
        // kondisi jika user nya ada 
        if ($user) {
            // jika user n
            return redirect()->intended('/home');
        }
        return view('login');
    }
    //
    public function proses_login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Ambil username dan password dari request
        $credential = $request->only('username', 'password');

        // Cek apakah username dan password cocok
        if (Auth::attempt($credential)) {
            // Jika berhasil login, arahkan ke halaman yang sesuai
            return redirect()->intended('home');
            // dd(Auth::user());
        }


        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->back()
            ->withInput()
            ->withErrors(['login_gagal' => 'Username atau password salah.']);
    }


    public function logout(Request $request)
    {
        // logout itu harus menghapus session nya 

        $request->session()->flush();

        // jalan kan juga fungsi logout pada auth 

        Auth::logout();
        // kembali kan ke halaman login
        return Redirect('/');
    }
}
