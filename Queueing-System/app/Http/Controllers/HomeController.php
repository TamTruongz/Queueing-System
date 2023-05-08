<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {

        return view('layout.dashboard');
    }

    // ==== Device Page ====

    // ==== Service Page ====


    // ==== Cấp số ====

    // ==== Báo cấp ====
    public function report()
    {
        return view('layout.report');
    }
    // ==== Vai trò ====
    public function role()
    {
        return view('layout.role');
    }
    public function add_role()
    {
        return view('layout.add_role');
    }
    public function update_role()
    {
        return view('layout.add_role');
    }

    // ==== Tài khoản ====
    public function account()
    {
        return view('layout.account');
    }
    public function add_account()
    {
        return view('layout.add_account');
    }
    public function update_account()
    {
        return view('layout.add_account');
    }

    // ==== Nhật ký tài khoản ====
    public function logs_user()
    {
        return view('layout.logs_user');
    }
}
