<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt($request->only('email','password'))){

        if(Auth::user()->is_admin)
            {
                return redirect()->route('admin.home');

            }
            Auth::logout();
        }
        return back()->withErrors(['email'=>'wrong credentials']);
    }




public function logout(Request $request)
{
    // Log out the user
    Auth::logout();

    // Invalidate the session
    $request->session()->invalidate();

    // Regenerate CSRF token
    $request->session()->regenerateToken();

    // Redirect to admin login page
    return redirect()->route('admin.index');
}
}
