<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
   public function index ()
   {
    return view ('login.index',[
        'title'=> 'login',
    ]);
   }
   public function authenticate(Request $request)
   {
       // Validasi input
       $credentials = $request->validate([
           'login' => 'required|string', // Ganti 'email' dengan 'login'
           'password' => 'required|string',
       ]);
   
       // Cek apakah input adalah email atau username
       $field = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
   
       // Coba autentikasi
       if (Auth::attempt([$field => $credentials['login'], 'password' => $credentials['password']])) {
           $request->session()->regenerate();
           return redirect()->intended('/home');
       }
   
       return back()->with('LoginError', 'Login Failed');
   }
   
   public function logout(Request $request)
   {
       Auth::logout();
   
       $request->session()->invalidate();
   
       $request->session()->regenerateToken();
   
       return redirect('/');
   }
}
