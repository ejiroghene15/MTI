<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class User extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = auth()->user();
        $courses_registered = $user->courses_registered->where('event_type', 'class')->where('payment_status', 1);
        return view('pages.dashboard.index', compact('user', 'courses_registered'));
    }

    public function updateProfile(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'fname' => ['required', 'max:255'],
            'lname' => ['required', 'max:255'],
        ], [
            "fname.required" => "First name is required",
            "lname.required" => "Last name is required"
        ]);

        if ($validatedData->fails()) {
            return back()->withErrors($validatedData)->withMessage("Profile not updated")->withType("danger");
        }

        ModelsUser::where('email', auth()->user()->email)->update([
            'phone_number' => $request->phone,
            'bio' => $request->bio,
            'first_name' => $request->fname,
            'last_name' => $request->lname
        ]);

        return back()->withMessage('Profile updated')->withType('success');
    }

    public function setProfilePix(Request $request)
    {
        $user = auth()->user()->email;

        $_validate_file = Validator::make($request->only('profilepix'), [
            'profilepix' => ['image', 'required'],
        ], ['profilepix.image' => 'Please upload a valid image', 'profilepix.required' => "Select an image for use as your profile picture"]);

        if ($_validate_file->fails()) {
            return back()->withErrors($_validate_file)->withMessage("Could not update profile picture")->withType("danger");
        }

        $save_to_cloudinary = $request->profilepix->storeOnCloudinaryAs('profiles', bin2hex($user));

        $upload_path = $save_to_cloudinary->getSecurePath();

        ModelsUser::where('email', $user)->update([
            'picture' => $upload_path,
        ]);

        return back()->withMessage('Profile picture updated')->withType('success');
    }

    public function changePassword(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'old_password' => ['required', 'max:255'],
            'password' => ['required', 'max:255', 'same:confirm_password'],
            'confirm_password' => ['required', 'max:255', 'same:confirm_password'],
        ], [
            "old_password.required" => "This is required to change your password",
            "password.same" => "Passwords must match",
            "password.required" => "Passwords must match",
            "confirm_password.required" => "This is required to change your password"
        ]);

        if ($validatedData->fails()) {
            return back()->withErrors($validatedData)->withMessage("Password could not be changed")->withType("danger");
        }

        ModelsUser::where('email', auth()->user()->email)->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->withMessage("Password changed. You'll be required to sign in with your new password when logging another time ")->withType('success');
    }
}
