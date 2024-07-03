<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
{
    if (!Auth::guard('users')->check()) {
        return $request->expectsJson() ? null : route('login');
    }

    // Điều hướng người dùng đã đăng nhập đến route mong muốn
    // Ví dụ: admin.dashboard là tên route cho trang admin sau khi đăng nhập thành công
    return route('admin.dashboard'); // Thay 'admin.dashboard' bằng route mong muốn của bạn
}

}
