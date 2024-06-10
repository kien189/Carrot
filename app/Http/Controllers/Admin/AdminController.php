<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.index');
    }


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
