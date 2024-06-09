<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\customer_reset_token;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    public function index()
    {
        return view('Fe.index');
    }
    public function login()
    {
        return view('Fe.Login-Register.login');
    }

    public function postLogin(Request $req)
    {
        // dd($req->all());
        $validate = $req->validate([
            'email'    => 'required|email|exists:customers',
            'password' => 'required|min:8'
        ]);
        $loginCustomers = $req->only('email', 'password');
        if (Auth::guard('customers')->attempt($loginCustomers)) {
            return redirect()->route('home')->with('success', 'Login successfully !');
        } else {
            return redirect()->back()->with('error', 'Login failed, please check your information !');
        }
    }

    public function register()
    {
        return view('Fe.Login-Register.register');
    }

    public function postRegister(Request $req)
    {
        $validate = $req->validate([
            'name' => ' required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|same:password|min:8',
            'address' => 'required|min:8',
            'phone' => 'numeric|digits:10|required'
        ]);
        try {
            $data = [
                "name" => $req->name,
                "email" => $req->email,
                "address" => $req->address,
                "phone" => $req->phone,
                "password" => Hash::make($req->password)
            ];
            // dd($data);
            Customers::create($data);
            return redirect()->route('login')->with('success', 'Creat an Account ssuccessfully !');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Creat an Account falil !');
        }
    }

    public function logout()
    {
        auth('customers')->logout();
        return redirect()->back()->with('success', 'Logout successfully !');
    }


    public function forgotPassword(){
        return view('Fe.Login-Register.forgotPassword');
    }

    public function postForgotPassword(Request $req){
        $validate = $req->validate([
            'email'=>'required|exists:customers'
        ]);
        $token = Str::random(20);
        $customers = Customers::where('email',$req->email)->first();
        $tokenData =[
            'email'=>$req->email,
            'token'=>$token,
        ];
        if(customer_reset_token::create($tokenData)){
            Mail::to($req->email)->send(new ForgotPassword($customers,$token));
            return redirect()->back()->with('success','Chúng tôi đã gửi mail đến bạn . Vui lòng kiểm tra mail !');
        }
    }
}
