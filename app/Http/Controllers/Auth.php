<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Auth extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'resendVerificationMail', 'verifyEmail');
    }

    public function login()
    {
        return view('login');
    }

    public function sendVerificationMail($user, $token, $type)
    {
        $sm = Mail::to($user)->send(new SendMail("$type", $token));
        return $sm;
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
            return redirect()->back()->withErrors($validator)->withInput()->withRegister("register");
        }

        $verification_token = Str::random(50) . "_" . bin2hex($request->email);

        $sm = $this->sendVerificationMail($request->email, $verification_token, 'registration');

        if (is_null($sm)) {
            User::create([
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'email' => $request->email,
                'email_verification_token' => $verification_token,
                'role' => $request->role,
                'course' => $request->course,
                'password' => Hash::make($request->password)
            ]);
            return redirect('login')->withMessage('Registration Successful. A verification link has been sent to your email')->withType("success");
        } else {
            return redirect('login')->withMessage('Registration Failed. An error occured on registration.')->withType("danger");
        }
    }

    public function resendVerificationMail()
    {
        $user = auth()->user()->email;
        $verification_token = Str::random(50) . "_" . bin2hex($user);
        $sm = $this->sendVerificationMail($user, $verification_token, 'verify_account');
        if (is_null($sm)) {
            User::where('email', $user)->update([
                'email_verification_token' => $verification_token
            ]);
            return back()->withMessage("A verification link has been sent. Refresh this page after you've verified your email")->withType("success");
        }
    }

    public function verifyEmail(Request $request)
    {
        $token_string = $request->query('token');
        $token = Str::before($token_string, '_');
        $user_email = hex2bin(Str::after($token_string, '_'));
        $verified  = User::where('email', $user_email)->where('email_verification_token', $token_string);

        if ($verified->count()) {
            $account_verified = $verified->update([
                'email_verified' => 1,
                'email_verified_at' => date('Y-m-d h:i:s'),
                'email_verification_token' => $token
            ]);
            return redirect()->route('login')->withVerified(true);
        } else {
            return redirect()->route('login')->withMessage("Your account could not be verified")->withType('danger');
        }
    }

    public function forgotPassword(Request $request)
    {
        $email = $request->email;
        $verification_token = Str::random(50) . "_" . bin2hex($request->email);

        $validator = Validator::make($request->only('email'), [
            'email' => ['email:rfc', 'required'],
        ], [
            "email.email" => 'Please enter a valid email adddress associated with your account',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'reset_password')->withMessage('Unable to send reset link')->withType('danger');
        }

        $user = User::where('email', $email);

        if ($user->count()) {

            $sm = $this->sendVerificationMail($request->email, $verification_token, 'reset_password');

            if (is_null($sm)) {
                $user->update([
                    'reset_password_token' => $verification_token,
                    'reset_password_token_expired' => strtotime('+30 mins')
                ]);
                return redirect()->route('login')->withMessage("A reset link has been sent to your emaiil address")->withType('success');
            }
        } else {
            return redirect()->back()->withMessage('No user associated with this email address was found')->withType('danger');
        }
    }

    public function resetPassword(Request $request)
    {
        $token_string = $request->query('token');
        $user_email = hex2bin(Str::after($token_string, '_'));
        $user  = User::where('email', $user_email)->where('reset_password_token', $token_string);
        $token_expired = $user->first()->reset_password_token_expired;
        if ($user->count()) {
            if (time() > $token_expired) {
                return redirect('login')->withMessage('Reset password link has expired')->withType('danger');
            } else {
                return  view('reset_password')->withToken($token_string);
            }
        } else {
            return redirect('login')->withMessage('Invalid password link')->withType('danger');
        }
    }

    public function changePassword(Request $request, $token)
    {

        $user_email = hex2bin(Str::after($token, '_'));

        $validatedData = Validator::make($request->only('password', 'confirm_password'), [
            'password' => ['required', 'max:255', 'same:confirm_password'],
            'confirm_password' => ['required', 'max:255', 'same:confirm_password'],
        ], [
            "password.same" => "Passwords must match",
            "password.required" => "Passwords is required",
            "confirm_password.required" => "This is required to change your password"
        ]);

        if ($validatedData->fails()) {
            return back()->withErrors($validatedData)->withMessage("Password could not be changed")->withType("danger");
        }

        User::where('email', $user_email)->update([
            'password' => Hash::make($request->password),
            'reset_password_token' => null
        ]);

        return redirect('login')->withMessage('Your password reset was successful')->withType('success');
    }

    public function authenticateUser(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $prev_url = session('prev-url');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            if (!empty($prev_url)) {
                return redirect($prev_url);
            }
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
