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
        }else{
            return redirect()->back()->with('status', 'Invalid email or password')->with('type', 'danger');
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

    public function postForgetPassword(Request $request)
    {
        $data = $request->validate([
            'email' => ['bail', 'required', Rule::exists('users', 'email')]
        ]);
        $user = User::where('email', $data['email']);
        // dd($user);
        // $randomCode = 
        $user->update([
            'email_verification_code' => random_int(100000,999999)
        ]);
        session(['requestedUser' => $data['email']]);
        return redirect()->route('verifyCode')->with('status', 'Verification mail has been send to ' . session()->get('requestedUser'))->with('type', 'success');

    }

    public function postVerifyCode(Request $request)
    {
        $data = $request->validate([
            'verificationCode' => ['required']
        ]);
        $requestedUser = session()->get('requestedUser');
        $currentUser = User::where('email', $requestedUser)->first();
        // dd($currentUser['email_verification_code']);
        if($data['verificationCode'] == $currentUser['email_verification_code']){
            return redirect()->route('getUpdateNewPassword');
        }else{
            return redirect()->back()->with('status', 'Invalid verification code.. Please enter the valid code')->with('type', 'danger');
        }
    }

    public function postUpdateNewPassword(Request $request)
    {
        $data = $request->validate([
            'password' => ['bail', 'required', 'confirmed', 'min:6', 'max:10'],
        ]);
        $requestedUser = session()->get('requestedUser');
        $currentUser = User::where('email', $requestedUser)->first();
        $currentUser->update([
            'password' => $data['password'],
            'email_verification_code' => null
        ]);
        return redirect()->route('login')->with('status', 'Password changed successfully.. Kindly login with new Password')->with('type', 'success');
    }

}
