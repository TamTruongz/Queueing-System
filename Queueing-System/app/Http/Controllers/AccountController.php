<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    // ==== Account ====

    // ===== LOGIN =================================================
    public function login(Request $request)
    {

        if ($request->isMethod('POST')) {
            $data = $request->validate(
                [
                    "username" => 'required',
                    "password" => 'required',
                ],
                [
                    "username.required" => 'Không được để trống tên đăng nhập',
                    "password.required" => 'Không được để trống mật khẩu',
                ]
            );

            if (Auth::attempt($data)) {
                // chứa thông tin đăng nhập
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }

            return back()->withErrors([
                'password' => 'Tên đăng nhập hoặc mật khẩu sai',

            ]);
        }
        return view('layout.login');
    }
    // ===== RESET PASSWORD =================================================

    public function reset_password()
    {
        return view('layout.reset_password');
    }
    // ===== FORGET PASSWORD =================================================

    public function forget_password()
    {
        return view('layout.forget_password');
    }

    // ===== LOGOUT =================================================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

    // ===== INFOMATION ACCOUNT =================================================
    public function user_info()
    {
        return view('layout.user_info');
    }
}
