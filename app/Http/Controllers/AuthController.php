<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function authenticate(Request $request){
        // dd('loginPost is called');
        // dd($request->all());
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');
        } else{
            dd('Error');
        }
    }

    public function SignOut(Request $request){
         Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
        return redirect('/');
    }
}
