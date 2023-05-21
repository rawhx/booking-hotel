<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\Http\Exceptions\NotFound;

class AuthContoroller extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
       // validation email
       $login = [
           'email' =>$request->username,
           'password' =>$request->password,
      ];

       // attempt login
       if (auth()->attempt($login)) {
           // if true, redirect to home page
           $session = $request->session()->regenerate();    
           return redirect()->route('dashboardadmin');
       }

       return redirect()->route('home');
       
       unset($session);
    }

    function logout(Request $request) {
        $logout = Auth::logout(); // Logout user
        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken();

        return redirect('/');
        unset($logout);
    }
}
