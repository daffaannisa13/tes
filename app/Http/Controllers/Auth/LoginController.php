<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index() {
        // tampilan login
        return view("auth.login");
    }

    public function login(Request $request) {
    try {
        
        $credentials = $this->validate($request, [
            "email" => "required|email:dns",
            "password" => "required|max:16"
        ]);
        
        if (!Auth::attempt($credentials)) throw new Error();
        
        
        $request->session()->regenerate();

        
        $user = Auth::user();

        
        if ($user->role === 'admin') {
            
            return redirect()->route("dashboard")->with("login", "Selamat Datang!");
        } else {
            
            return redirect()->route("d")->with("login", "Selamat Datang!");
        }
    } catch(ValidationException $e) {
        return back()->with("errorLogin", "Email atau Password salah");
    }
}
}