<?php

// namespace App\Http\Controllers\Auth;
// use App\Models\Account;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;
// use App\Mail\SendMail;
// use Illuminate\Support\Facades\Mail;

// class ForgotPasswordController extends Controller
// {
//     public function ForgetPassword () {
//         return view('layout.account.forget_password');
//     }
//     public function showResetForm (Request $request) {
//         $reset_email = $request->session()->get('reset_email');
        
//         return view('layout.account.reset_password', compact('reset_email'));
//     }

//     public function VerifyEmail(Request $request)
//     {
//         $request->validate(['email' => 'required|email']);

//         $account = DB::table('accounts')->where('email', $request->email)->first();

//         if ($account) {
//             $request->session()->put('reset_email', $account->email);
//             return redirect('/reset_password');
//         }

//         return back()->withErrors([
//             'email' => 'Email không tồn tại !',
//         ]);
//     }

//     public function updatePassword(Request $request)
//     {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required|min:6|confirmed',
//     ], [
//         'password.required' => 'Hãy nhập mật khẩu mới.',
//         'password.min' => 'Mật khẩu mới quá ngắn.',
//         'password.confirmed' => 'Nhập lại mật khẩu không khớp.',
//     ]);

//     $reset_email = $request->session()->get('reset_email');

//     if (!$reset_email) {
//         return redirect('/forget_password');
//     }

//     $account = Account::where('email', $reset_email)->first();

//     if (!$account) {
//         return redirect('/forget_password');
//     }

//     $account->password = bcrypt($request->password);
//     $account->save();

//     // Xóa session reset_email
//     $request->session()->forget('reset_email');

//     return redirect('/login')->with('success', 'Mật khẩu của bạn đã được cập nhật thành công !');
//     }
// }



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\ResetPasswordMail;

class ForgotPasswordController extends Controller
{
    public function forgetPassword()
    {
        return view('layout.account.forget_password');
    }

    public function verifyEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $account = Account::where('email', $request->email)->first();

        if ($account) {
            $token = Str::random(60);
            DB::table('password_reset_tokens')->insert([
                'email' => $account->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
            Mail::to($account->email)->send(new ResetPasswordMail($token));
            $request->session()->put('reset_email', $account->email);

            return redirect()->route('password.forget')
                ->with('success', 'Đường link đổi mật khẩu đã được gửi đến email của bạn');
        }

        return back()->withErrors([
           'email' => 'Email không tồn tại !',
        ]);
    }

    public function showResetForm(Request $request, $token)
    {
        $reset = DB::table('password_reset_tokens')->where('token', $token)->first();
        $reset_email = $request->session()->get('reset_email');
        if (!$reset) {
            return redirect()->route('password.forget')
                ->withErrors(['token' => 'Đường link đổi mật khẩu không hợp lệ hoặc đã hết hạn']);
        }

        return view('layout.account.reset_password', ['token' => $token], compact('reset_email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ],[
            'password.required' => 'Hãy nhập mật khẩu mới.',
            'password.min' => 'Mật khẩu mới quá ngắn.',
            'password.confirmed' => 'Nhập lại mật khẩu không khớp.',
        ]);

        $reset = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$reset) {
            return redirect()->route('password.forget')
                ->withErrors(['token' => 'Đường link đổi mật khẩu không hợp lệ hoặc đã hết hạn']);
        }

        $account = Account::where('email', $request->email)->first();

        if (!$account) {
            return redirect()->route('password.forget')
                ->withErrors(['email' => 'Email không tồntại trong hệ thống']);
        }

        $account->password = bcrypt($request->password);
        $account->save();

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect('/login')->with('success', 'Mật khẩu của bạn đã được cập nhật thành công !');
    }
}