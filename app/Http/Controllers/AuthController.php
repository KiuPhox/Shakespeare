<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;
use function MongoDB\Driver\Monitoring\removeSubscriber;

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
            }


            session()->put('id', $user->id);
            session()->put('name', $user->name);
            session()->put('level', $user->level);

            return redirect()->route('books.index');
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
        User::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'level' => 1,
        ]);
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle()
    {

            $google_user = Socialite::driver('google')->user();
            $hashed_random_password = Hash::make(Str::random(7));

            $user = User::where('email', $google_user->getEmail())->first();
            if (!$user) {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'level' => 1,
                    'password' => $hashed_random_password,
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
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
}
