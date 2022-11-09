<?php

namespace App\Http\Controllers;

use App\Mail\NewUserNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

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
            'email' => ['bail', 'required','email:rfc,dns', 'exists:users'],
            'password' => ['bail', 'required','min:6','max:255']
        ],
        [
            'email.exists' => "Email does'nt exists in our database",
        ]);
        if (auth()->attempt($user)) {
            $userRoleId = auth()->user()->role_id;
            if($userRoleId == 1){
                return redirect()->route('admin.dashboard')->with('status', 'Welcome admin')->with('type', 'success');
            }else{
                return redirect()->route('dashboard')->with('status', 'Login successfull')->with('type', 'success');
            }
        }
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function setRegister(Request $request)
    {
        $user = $request->validate([
            'name' => ['bail', 'required', 'min:3', 'max:'. config('constant.max_string_length')],
            'username' => ['bail', 'required', Rule::unique('users')],
            'email' => ['bail', 'required', 'email:rfc,dns', Rule::unique('users')],
            'password' => ['bail', 'required', 'confirmed', 'min:6', 'max:' . config('constant.max_string_length')]
        ]);
        if(User::create($user)){
            Mail::to($user['email'])->send(new NewUserNotification($user));
        }
        return redirect()->route('login')->with('status', 'User register successfully')->with('type', 'success');
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function setLogout()
    {
        auth()->logout();
        return redirect()->route('home')->with('status', 'Logout Successfull')->with('type', 'success');
    }

}
