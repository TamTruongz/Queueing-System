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
    public function device()
    {
        return view('layout.device');
    }

    public function add_device()
    {
        return view('layout.add_device');
    }

    public function info_device()
    {
        return view('layout.info_device');
    }

    public function update_device()
    {
        return view('layout.update_device');
    }
    // ==== Service Page ====
    public function service()
    {
        return view('layout.service');
    }

    public function info_service()
    {
        return view('layout.info_service');
    }

    public function add_service()
    {
        return view('layout.add_service');
    }
    public function update_service()
    {
        return view('layout.add_service');
    }

    // ==== Cấp số ====

    public function codes()
    {
        return view('layout.codes');
    }
    public function codes_new()
    {
        return view('layout.codes_new');
    }
    public function info_codes()
    {
        return view('layout.info_codes');
    }

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
