<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Auth;
use App\Models\Account;
use App\Models\Ticket;

class HeaderComposer
{
    public function compose(View $view)
    {
        $tickets = Ticket::latest('created_at')->get();
        // Lấy thông tin người dùng đăng nhập thành công
        $user = Auth::user();

        // Nếu người dùng đã đăng nhập, lấy tên và avatar của người dùng từ bảng accounts
        if ($user) {
            $account = Account::where('id', $user->id)->first();
            $userName = $account->name;
            $userAvatar = $account->avatar;
        } else {
            $userName = '';
            $userAvatar = '';
        }

        // Tiêu đề trang
        $pageTitle = '';
        $pageTitleChild = '';
        $pageTitleLast = '';
        $routePage = '';
        switch (request()->route()->getName()) {
            case 'dashboard':
                $pageTitle = 'Dashboard';
                break;
            //============================
            case 'device':
                $pageTitle = 'Thiết bị';
                $pageTitleChild = 'Danh sách thiết bị';
                break;
            case 'device.create':
                $pageTitle = 'Thiết bị';
                $pageTitleChild = 'Danh sách thiết bị';
                $pageTitleLast = 'Thêm thiết bị';
                $routePage = '/device';
                break;
            case 'device.edit':
                $pageTitle = 'Thiết bị';
                $pageTitleChild = 'Danh sách thiết bị';
                $pageTitleLast = 'Cập nhật thiết bị';
                $routePage = '/device';
                break;
            case 'device.info':
                $pageTitle = 'Thiết bị';
                $pageTitleChild = 'Danh sách thiết bị';
                $pageTitleLast = 'Chi tiết thiết bị';
                $routePage = '/device';
                break;
            //============================
            case 'service':
                $pageTitle = 'Dịch vụ';
                $pageTitleChild = 'Danh sách dịch vụ';
                break;
            case 'service.create':
                $pageTitle = 'Dịch vụ';
                $pageTitleChild = 'Danh sách dịch vụ';
                $pageTitleLast = 'Thêm dịch vụ';
                $routePage = '/service';
                break;
            case 'service.edit':
                $pageTitle = 'Dịch vụ';
                $pageTitleChild = 'Danh sách dịch vụ';
                $pageTitleLast = 'Cập nhật dịch vụ';
                $routePage = '/service';
                break;
            case 'service.info':
                $pageTitle = 'Dịch vụ';
                $pageTitleChild = 'Danh sách dịch vụ';
                $pageTitleLast = 'Chi tiết dịch vụ';
                $routePage = '/service';
                break;
            //========================
            case 'ticket':
                $pageTitle = 'Cấp số';
                $pageTitleChild = 'Danh sách cấp số';
                break;
            case 'ticket.create':
                $pageTitle = 'Cấp số';
                $pageTitleChild = 'Danh sách cấp số';
                $pageTitleLast = 'Cấp số mới';
                $routePage = '/ticket';
                break;
            case 'ticket.info':
                $pageTitle = 'Cấp số';
                $pageTitleChild = 'Danh sách cấp số';
                $pageTitleLast = 'Chi tiết';
                $routePage = '/ticket';
                break;
            // ============================
            case 'report':
                $pageTitle = 'Báo cáo';
                $pageTitleChild = 'Lập báo cáo';
                break;
            // ============================
            case 'role':
                $pageTitle = 'Cài đặt hệ thống';
                $pageTitleChild = 'Quản lý vai trò';
                break;
            case 'role.create':
                $pageTitle = 'Cài đặt hệ thống';
                $pageTitleChild = 'Quản lý vai trò';
                $pageTitleLast = 'Thêm vai trò';
                $routePage = '/role';
                break;
            case 'role.edit':
                $pageTitle = 'Cài đặt hệ thống';
                $pageTitleChild = 'Quản lý vai trò';
                $pageTitleLast = 'Cập nhật vai trò';
                $routePage = '/role';
                break;
            // ============================
            case 'account':
                $pageTitle = 'Cài đặt hệ thống';
                $pageTitleChild = 'Quản lý tài khoản';
                break;
            case 'account.create':
                $pageTitle = 'Cài đặt hệ thống';
                $pageTitleChild = 'Quản lý tài khoản';
                $pageTitleLast = 'Thêm tài khoản';
                $routePage = '/account';
                break;
            case 'account.edit':
                $pageTitle = 'Cài đặt hệ thống';
                $pageTitleChild = 'Quản lý tài khoản';
                $pageTitleLast = 'Cập nhật tài khoản';
                $routePage = '/account';
                break;
            // ============================
            case 'logs':
                $pageTitle = 'Cài đặt hệ thống';
                $pageTitleChild = 'Nhật ký tài khoản';
                break;
            default:
                $pageTitle = '';
                $pageTitleChild = '';
                $pageTitleLast = '';
                $routePage = '';
                break;
        }

        // Truyền dữ liệu vào view
        $view->with([
            'userName' => $userName, 
            'userAvatar' => $userAvatar, 
            'tickets' => $tickets, 
            'pageTitle'=> $pageTitle,
            'pageTitleChild'=> $pageTitleChild,
            'pageTitleLast'=> $pageTitleLast,
            'routePage'=> $routePage,
        ]);
    }
}