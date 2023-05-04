<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Auth;
use App\Models\Account;

class HeaderComposer
{
    public function compose(View $view)
    {
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

        // Truyền dữ liệu vào view
        $view->with('userName', $userName);
        $view->with('userAvatar', $userAvatar);
    }
}