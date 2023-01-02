<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session as FacadesSession;

class LoginController extends Controller
{
    function index()
    {
        return view('Auth.login');
    }

    function registration()
    {
        return view('Auth.registrasi');
    }

    function validate_registration(Request $request)
    {
        $request->validate([
            'nip'          =>   'required|min:9',
            'name'         =>   'required',
            'alamat'       =>   'required',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'nip'      =>  $data['nip'],
            'name'     =>  $data['name'],
            'alamat'   =>  $data['alamat'],
            'email'    =>  $data['email'],
            'password' => FacadesHash::make($data['password'])
        ]);

        return redirect('login')->with('success', 'Registrasi Berhasil, Silahkan Login!');
    }

    function validate_login(Request $request)
    {
        $request->validate([
            'nip'       =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('nip', 'password');

        if(Auth::attempt($credentials))
        {
            return redirect('dashboard');
        }

        return redirect('login')->with('info', 'Maaf, NIP atau Password Salah!');
    }

    function dashboard()
    {
        if(Auth::check())
        {
            return view('AdminDashboard.dashboard');
        }

        return redirect('login')->with('error', 'Login Gagal!');
    }

    // function __construct() {
    //     $this->middleware('auth');
    // }

    function logout()
    {
        FacadesSession::flush();
        Auth::logout();
        return Redirect('/');
    }
}
