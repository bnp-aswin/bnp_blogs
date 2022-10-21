<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function getLogin()
    {
        return view('auth.login');
    }

    public function setLogin(Request $request)
    {
        $user = $request->validate([
            'email' => ['required','email:rfc,dns'],
            'password' => ['required','min:6','max:256']
        ]);
        auth()->attempt($user);
        return redirect()->route('dashboard')->with('status', 'Login successfull');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function setRegister(Request $request)
    {
        $user = $request->validate([
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required', 'confirmed', 'min:6', 'max:256']
        ]);
        User::create($user);
        return redirect()->route('login')->with('status', 'User register successfully');
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function setLogout()
    {
        auth()->logout();
        return redirect()->route('home')->with('status', 'Logout Successfull');
    }

}
