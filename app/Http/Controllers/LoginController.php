<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view('login.aplikasi');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('username', 'password'))){
            $user = Auth::user();
    
            if($user->level === 'admin'){
                return redirect('/dashboard'); // Ganti dengan route atau URL yang sesuai untuk home pustakawan
            } elseif($user->level === 'user'){ // Use elseif instead of if else
                return redirect('/home');
            } else {
                // Ganti dengan route atau URL yang sesuai untuk home customer atau halaman utama
                return redirect('/');
            }
        }
    
        return redirect('/login')->with('error', 'Invalid credentials');
    }
    
    
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}