<?php

namespace App\Http\Controllers\fronend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserMailRequest;
use App\Mail\ForgetPassword;
use App\Mail\UserVerificationMail;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function register()
    {
        return view('frontend.auth.register');
    }

    public function login()
    {
        return view('frontend.auth.login');
    }

    public function registersave(RegisterRequest $request)
    {
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->phone_no = $request->phone_no;
        $user->bio = $request->bio;
        $user->profile_picture = 'default-instagram_profile.jpg';
        // $user->profile_visibility = $request->profile_visibility;
        $user->save();

        VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time()),
        ]);


        Mail::to($user->email)->send(new UserVerificationMail($user));
        return redirect()->back()->with('success', 'Please Check Your MailBox');
    }


    public function loginmatch(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user->verified == 0) {
            return redirect()->route('login')->with('success', 'please verify your email');
        }

        $credatails = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credatails)) {
            return redirect()->route('profile.index');
        } else {
            return redirect()->route('login')->with('error', 'Either Mail or Password is Incorrect');
        }
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if ($verifyUser->user->verified == 0) {
            $verifyUser->user->verified = 1;
            $verifyUser->user->save();
            return redirect()->route('login')->with('success', 'Your Mail Is Verified');
        } elseif ($verifyUser->user->verified == 1) {
            return redirect()->route('login')->with('success', 'Your Mail is Already Verified');
        }
    }

    public function showForgetPasswordForm()
    {
        return view('frontend.forgot_password.verifymail');
    }

    public function sendMailForForgotPassword(UserMailRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            Mail::to($user->email)->send(new ForgetPassword($user));
            return redirect()->route('user.mail.page')->with('success', 'Please Check your MailBox');
        } else {
            return redirect()->route('user.mail.page')->with('error', "You Are Not a Member");
        }
    }


    public function forgotPassword($token)
    {
        $verifyUser = verifyUser::where('token', $token)->first();
        if ($verifyUser) {
            return view('frontend.forgot_password.forget_password', compact('verifyUser'));
        } else {
            return redirect()->route('login')->with('error', 'your mail is not found');
        }
    }

    public function newPassword(ForgetPasswordRequest $request)
    {
        $verifyUser = VerifyUser::where('token', $request->user_token)->first();
        $finduser = User::where('id', $verifyUser->user_id)->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('login')->with('success', 'Your Password Has Been Changed');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function Profile()
    {
        return view('frontend.profile-page.create');
    }

}
