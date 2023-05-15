<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\AccountLog;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class LogAccountActions

{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        
        // Lấy thông tin người dùng đăng nhập
        $user = Auth::user();

        // Nếu người dùng tồn tại
        if ($user) {
            // Lưu thông tin vào bảng account_logs
            $log = new AccountLog();
            $log->username = $user->username;
            $log->action_time = Carbon::now()->format('Y-m-d H:i:s');
            $log->ip_address = $request->ip();
            $log->action = $this->getAction($request);
            $log->save();
        }
    
        return $response;
    }
    
    private function getAction($request)
    {
        if ($request->isMethod('post')) {
           
            if ($request->routeIs('device.store')) { 
                return 'Thêm thiết bị';
            } 
            elseif ($request->routeIs('service.store')) {
                return 'Thêm dịch vụ';
            } 
            elseif ($request->routeIs('ticket.store')) {
                return 'Cấp số mới';
            } 
            elseif ($request->routeIs('role.store')) {
                return 'Thêm vai trò';
            } 
            elseif ($request->routeIs('account.store')) {
                return 'Thêm tài khoản';
            } 
            else {
                return 'Thêm'; // Mặc định
            }
        } 
        elseif ($request->isMethod('put')) {
            if ($request->routeIs('device.update')) {
                return 'Cập nhật thông tin thiết bị';
            } 
            elseif ($request->routeIs('service.update')) {
                return 'Cập nhật thông tin dịch vụ';
            } 
            elseif ($request->routeIs('role.update')) {
                return 'Cập nhật thông tin vai trò';
            } 
            elseif ($request->routeIs('account.update')) {
                return 'Cập nhật thông tin tài khoản';
            } 
            else {
                return 'Cập nhật'; // Trường hợp mặc định
            }
        } 
        else {
            return '';
        }
    }
}