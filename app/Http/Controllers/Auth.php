<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Auth extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function newUserRegistration(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'bail|email|unique:users,email|max:100',
            'role' => 'required',
            'course' => 'required',
            'password' => 'bail|required|filled|same:confirm_password',
            'confirm_password' => 'bail|required|filled|same:password'
        ], [
            "fname.required" => 'First name is required',
            "lname.required" => 'Last name is required',
            "email.unique" => 'An account with this email address already exists'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'role' => $request->role,
            'course' => $request->course,
            'password' => Hash::make($request->password)
        ]);

        return redirect('login')->withMessage('Registration Successful. A verification link has been sent to your email')->withType("success");
    }

    public function authenticateUser(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended();
        } else {
            return back()->withMessage('Incorrect login details')->withType('warning');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
