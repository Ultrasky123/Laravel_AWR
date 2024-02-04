<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home', ['locale' => app()->getLocale()]);
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
