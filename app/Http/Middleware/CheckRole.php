<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // 2. Kiểm tra xem role_id của user có nằm trong danh sách quyền được phép không
        // Giả sử bảng users của bạn có cột 'role_id'
        if (in_array($user->role_id, $roles)) {
            return $next($request);
        }

        // 3. Nếu không có quyền, trả về lỗi 403 hoặc chuyển hướng
        abort(403, 'Bạn không có quyền truy cập trang này.');
    }
}
