<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    function index(){
        return view('auth.login');
    }
    function login(Request $request){
        // return $request;
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($credential)){
            return redirect()->intended('/');
        }
            return back()->withErrors(['fail' => 'Login Gagal']);
        
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    function showRegister(){
        return view('auth.register');
    }


    function register(Request $request){
        // return $request;
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        $validateData ['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/login')->with('success', 'Registrasi Berhasil Silahkan Login');
    }


}
