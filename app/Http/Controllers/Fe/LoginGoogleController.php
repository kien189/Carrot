<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            // dd($user);
            $finduser = Customers::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::guard('customers')->login($finduser);

                return redirect()->route('home');
            } else {
                $newUser = Customers::updateOrCreate(['email' => $user->email], [
                    'name' => $user->name,
                    'image'=>$user->picture,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::guard('customers')->login($newUser);

                return redirect()->route('home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->route('login');
        }
    }
}
