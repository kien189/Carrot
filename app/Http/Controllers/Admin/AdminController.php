<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
// use SebastianBergmann\CodeCoverage\Driver\Driver;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.master');
    }

    public function register()
    {
        return view('Admin.Login.register');
    }

    public function postregister()
    {
    }

    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }
    // public function handleGoogleCallback()
    // {
    //     try {

    //         $user = Socialite::driver('google')->user();

    //         $finduser = User::where('google_id', $user->id)->first();

    //         if($finduser){

    //             Auth::guard('users')->login($finduser);

    //             return redirect()->route('admin.index');

    //         }else{
    //             $newUser = User::updateOrCreate(['email' => $user->email],[
    //                     'name' => $user->name,
    //                     'google_id'=> $user->id,
    //                     'password' => encrypt('123456dummy')
    //                 ]);

    //                 Auth::guard('users')->login($newUser);

    //             return redirect()->route('product.index');
    //         }

    //     } catch (Exception $e) {
    //         return redirect()->route('admin.login');
    //     }
    // }

    public function login()
    {
        return view('Admin.Login.login');
    }

    public function postLogin(Request $req)
    {
        $validate = $req->validate([
            'login'    => 'required|string',
            'password' => 'required'
        ]);
        $login = $req->input('login');

        $fillerLogin = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $data = [
            $fillerLogin => $login,
            'password' => $req->password
        ];
        if (auth('users')->attempt($data, true)) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        try {
            auth('users')->logout();
            return redirect()->route('admin.login');
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
