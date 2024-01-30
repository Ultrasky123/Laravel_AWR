<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
            // session(['user' => Auth::user()->name]);
            // dd($request->session());
            // dd(session('user'));
            return redirect()->route('home');
        } else{
            dd('Error');
        }
    }

    public function SignOut(Request $request){
         Auth::logout();
         // $request->session()->forget('user');
         $request->session()->invalidate();
         $request->session()->regenerateToken();
        // dd($request->session()->getId());
        return redirect('/');
    }

    // public function showPage(Request $request){
    //     dd($request->session()->all());
    //     // Check if the 'user' session data exists
    //     // if (!$request->session()->has('user')) {
    //         // If not, redirect to the index page
    //         // return Redirect::route('index');
    //     //     return redirect()->route('index');
    //     // }

    //     // If the 'user' session data exists, continue to the page
    //     // return view('home');
    // }
}
