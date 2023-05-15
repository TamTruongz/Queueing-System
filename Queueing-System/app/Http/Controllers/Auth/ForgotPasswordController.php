<?php

namespace App\Http\Controllers\Auth;
use App\Models\Account;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function ForgetPassword () {
        return view('layout.account.forget_password');
    }
    public function showResetForm (Request $request) {
        $reset_email = $request->session()->get('reset_email');
        
        return view('layout.account.reset_password', compact('reset_email'));
    }

    public function VerifyEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $account = DB::table('accounts')->where('email', $request->email)->first();

        if ($account) {
            $request->session()->put('reset_email', $account->email);
            return redirect('/reset_password');
        }

        return back()->withErrors([
            'email' => 'Email không tồn tại !',
        ]);
    }

    public function updatePassword(Request $request)
    {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ], [
        'password.required' => 'Hãy nhập mật khẩu mới.',
        'password.min' => 'Mật khẩu mới quá ngắn.',
        'password.confirmed' => 'Nhập lại mật khẩu không khớp.',
    ]);

    $reset_email = $request->session()->get('reset_email');

    if (!$reset_email) {
        return redirect('/forget_password');
    }

    $account = Account::where('email', $reset_email)->first();

    if (!$account) {
        return redirect('/forget_password');
    }

    $account->password = bcrypt($request->password);
    $account->save();

    // Xóa session reset_email
    $request->session()->forget('reset_email');

    return redirect('/login')->with('success', 'Mật khẩu của bạn đã được cập nhật thành công !');
}
}