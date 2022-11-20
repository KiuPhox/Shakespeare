<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPasswordMail;
use App\Models\PasswordReset;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;
use function MongoDB\Driver\Monitoring\removeSubscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        try {
            $user = User::query()
                ->where('email', $request->get('email'))
                ->firstOrFail();

                if (!Hash::check($request->get('password'), $user->password)) {
                    throw new Exception('invalid password');
                } else if (!$user->email_verified_at) {
                    throw new Exception('email is not verified');
                }


            session()->put('id', $user->id);
            session()->put('name', $user->name);
            session()->put('level', $user->level);

            return redirect()->route('home.index');
        }
        catch (Throwable $e) {
            return redirect()->route('login');
        }
    }

    public function logout(){
        $cart = session()->get('cart');
        session()->flush();
        session()->put('cart', $cart);
        return redirect()->route('home.index');
    }

    public function signup(){
        return view('auth.signup');
    }

    public function processSignup(Request $request)
    {
        $rules = [
            'email' => 'unique:App\Models\User,email',
        ];



        $request->validate($rules);

        $user= User::query()->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'level' => 1,
                'email_verification_code' =>Str::random(10)
            ]);

            Mail::to($request -> email)->send(new EmailVerificationMail($user));
            return redirect()->back()->with('success', 'Verification');

        }

    public function verifyEmail($verification_code){
        $user = User::where('email_verification_code', $verification_code)->first();
        if(!$user) {
            return redirect()->route('signup')->with('error', 'Invalid');
        }else {
            if($user->email_verified_at){
                return redirect()->route('signup')->with('error', 'Email already verified');
            }else{
                $user->update([
                    'email_verified_at' =>Carbon::now()
                ]);
                return redirect()->route('signup')->with('success', 'Email verified');
            }
        }
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle()
    {

            $google_user = Socialite::driver('google')->user();
            $hashed_random_password = Hash::make(Str::random(20));

            $user = User::where('email', $google_user->getEmail())->first();
            if (!$user) {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'level' => 1,
                    'password' => $hashed_random_password,
                    'email' => $google_user->getEmail(),
                    'email_verified_at' =>Carbon::now()
                ]);

                session()->put('id', $new_user->id);
                session()->put('name', $new_user->name);
                session()->put('level', $new_user->level);

                return redirect()->route('home.index');
            } else {

                session()->put('id', $user->id);
                session()->put('name', $user->name);
                session()->put('level', $user->level);
                return redirect()->route('home.index');
            }

    }

    public function getForgetPassword(){
        return view('auth.forget_password');
    }

    public function postForgetPassword(Request $request){
        $user = User::where('email', $request->email)->first();

        if(!$user){
            return redirect()->back();
        } else {
            $reset_code = Str::random(100);
            PasswordReset::create([
                'user_id' => $user->id,
                'reset_code' => $reset_code,
            ]);

            Mail::to($user->email)->send(new ForgetPasswordMail($user->name,$reset_code));
            return redirect()->back();
        }
    }

    public function getResetPassword($reset_code){
        $password_reset_data = PasswordReset::where('reset_code', $reset_code)->first();
        if(!$password_reset_data || Carbon::now()->subMinutes(50) > $password_reset_data->created_at)
        {
            return redirect()->route('getForgetPassword');
        } else {
            return view('auth.reset_password', ['reset_code' => $reset_code]);
        }
    }

    public function postResetPassword($reset_code, Request $request){
        $password_reset_data = PasswordReset::where('reset_code', $reset_code)->first();
        if(!$password_reset_data || Carbon::now()->subMinutes(50) > $password_reset_data->created_at)
        {
            return redirect()->route('getForgetPassword');
        } else {
            $request->validate([
                'password' => 'required|min:6|max:20',
                'confirm_password' => 'required|same:password',
            ]);
            $user = User::find($password_reset_data->user_id);
            $password_reset_data->delete();
            $user->update([
                'password' => Hash::make($request->get('password')),
            ]);
            return redirect()->route('login');
        }
    }

}

