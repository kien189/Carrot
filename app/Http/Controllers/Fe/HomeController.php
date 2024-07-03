<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\Category;
use App\Models\customer_reset_token;
use App\Models\Customers;
use App\Models\Product;
use App\Models\ProductImages;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    public $product;
    public $cate;
    public $getCate;

    // Sử dụng Dependency Injection để inject các Model vào constructor
    public function __construct(Product $product, Category $category)
    {
        $this->product = $product->orderBy('id', 'desc')->get();
        $this->getCate = $category->all();
        $this->cate = $category->where('parent_id', '=', $category->parent_id)->get();
    }
    public function index(Category $category)
    {
        // dd($this->cate);
        return view('Fe.index', [
            'product' => $this->product,
            'cate' => $this->cate,
        ]);
    }

    public function search(Category $category, Request $req, $search)
    {
        $search = str_replace('-', ' ', $search);
        $productSearch = Product::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        })->get();
        return view('Fe.search', [
            'search' => $search,
            'productSearch' => $productSearch,
            'product' => $this->product,
            'cate' => $this->cate,
        ]);
    }


    public function getSearch(Request $req)
    {
        $search = $req->input('search');
        $searchUrl  = str_replace(' ', '-', $search);
        return redirect()->route('search', ['search' => $searchUrl]);
    }

    public function detail($product, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('Fe.Shop.detail', compact('product'));
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
        if (Auth::guard('customers')->attempt($loginCustomers, true)) {
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


    public function forgotPassword()
    {
        return view('Fe.Login-Register.forgotPassword');
    }

    // public function postForgotPassword(Request $req)
    // {
    //     $now = Carbon::now('Asia/Ho_Chi_Minh');
    //     $validate = $req->validate([
    //         'email' => 'required|exists:customers'
    //     ]);
    //     // dd($now);
    //     $token = Str::random(4);
    //     $expiresAt = $now->addMinutes(5);
    //     $tokenData = customer_reset_token::updateOrCreate(
    //         ['email' => $req->email],
    //         [
    //             'token' => $token,
    //             'expires_at' => $expiresAt,
    //             'is_used' => false
    //         ]
    //     );
    //     Mail::to($req->email)->queue(new ForgotPassword($tokenData->customers, $token));
    //     return redirect()->back()->with('success', 'Chúng tôi đã gửi mail đến bạn. Vui lòng kiểm tra mail!');
    // }
    // public function resetPassword(Request $request, $token)
    // {
    //     $tokenData = customer_reset_token::where('token', $token)
    //         ->where('is_used', false) // Chỉ lấy token chưa được sử dụng
    //         ->first();
    //     if (!$tokenData || $tokenData->expires_at < Carbon::now('Asia/Ho_Chi_Minh')) {
    //         return redirect()->route('forgotPassword')->with('error', 'Token không hợp lệ hoặc đã hết hạn.');
    //     }
    //     return view("Fe.Login-Register.resetPassword", ['token' => $token]);
    // }
    // public function  postResetPassword(Request $req, $token)
    // {
    //     $req->validate([
    //         'password' => "required|string|min:8|regex:/[a-z,A-Z,0-9]/|confirmed",
    //         'confirmPassword' => "required|string|min:8|regex:/[a-z,A-Z,0-9]/|same:password"
    //     ]);
    //     // $tokenData = customer_reset_token::where('token', $token)
    //     //     ->where('is_used', false) // Chỉ lấy token chưa được sử dụng
    //     //     ->first();

    //     // // Nếu token không tồn tại hoặc đã hết hạn
    //     // if (!$tokenData || $tokenData->expires_at < Carbon::now('Asia/Ho_Chi_Minh')) {
    //     //     return redirect()->route('forgotPassword')->with('error', 'Token không hợp lệ hoặc đã hết hạn.');
    //     // }
    //     // $customer = $tokenData->customer;
    //     // // Lưu mật khẩu mới
    //     // $customer->password = bcrypt($req->password);
    //     // $customer->save();
    // }


    public function postForgotPassword(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:customers,email'
        ]);

        $tokenData = customer_reset_token::updateOrCreate(
            ['email' => $req->email],
            [
                'token' => rand(100000, 999999),
                'expires_at' => now()->addMinutes(5),
                'is_used' => false
            ]
        );
        $customer = Customers::where('email',$req->email)->first();
        // dd($customer);
        Mail::to($req->email)->queue(new ForgotPassword( $customer, $tokenData->token));

        return redirect()->route('verifyOTP')->with('success', 'Chúng tôi đã gửi mail đến bạn. Vui lòng kiểm tra mail!');
    }

    public function showVerifyOTP()
    {
        return view('Fe.Login-Register.otp');
    }

    public function postVerifyOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6', // Yêu cầu mã OTP là một chuỗi có đúng 6 ký tự
        ]);

        $tokenData = customer_reset_token::where('token', $request->otp)
            ->where('is_used', false)
            ->where('expires_at', '>', now()) // Đảm bảo mã OTP chưa hết hạn
            ->first();

        // Kiểm tra token tồn tại và hợp lệ
        if (!$tokenData) {
            return redirect()->back()->with('error', 'Mã OTP không hợp lệ hoặc đã hết hạn.');
        }

        // Đánh dấu OTP đã được sử dụng
        $tokenData->update(['is_used' => true]);

        return redirect()->route('resetPassword', ['token' => $tokenData->token]);
    }

    public function resetPassword($token)
    {
        $tokenData = customer_reset_token::where('token', $token)->first();

        // Kiểm tra token tồn tại và hợp lệ
        if (!$tokenData) {
            return redirect()->route('forgotPassword')->with('error', 'Token không hợp lệ hoặc đã được sử dụng.');
        }

        return view("Fe.Login-Register.resetPassword", ['token' => $token]);
    }

    public function postResetPassword(Request $req, $token)
    {
        $req->validate([
            'password' => "required|string|min:8|regex:/[a-z,A-Z,0-9]/",
            'confirmPassword' => "required|string|min:8|regex:/[a-z,A-Z,0-9]/|same:password"
        ]);

        // Truy vấn bản ghi cụ thể từ bảng customer_reset_token
        $tokenData = customer_reset_token::where('token', $token)->first();

        if (!$tokenData) {
            return redirect()->route('forgotPassword')->with('error', 'Token không hợp lệ hoặc đã được sử dụng.');
        }

        // Tìm người dùng từ bảng Customers dựa trên email trong tokenData
        $customer = Customers::where('email', $tokenData->email)->first();

        if (!$customer) {
            return redirect()->route('forgotPassword')->with('error', 'Không tìm thấy người dùng với email tương ứng.');
        }

        // Cập nhật mật khẩu mới cho người dùng
        $customer->password = bcrypt($req->password);
        $customer->save();

        // Xóa token sau khi sử dụng
        // $tokenData->delete();

        return redirect()->route('login')->with('success', 'Mật khẩu đã được đặt lại thành công. Vui lòng đăng nhập bằng mật khẩu mới.');
    }





    public function blogs()
    {
        return view('Fe.Blog.blog');
    }
}
