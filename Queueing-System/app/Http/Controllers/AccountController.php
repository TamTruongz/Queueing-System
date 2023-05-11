<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    // ===== REGISTER =================================================
    public function register()
    {
        $roles = Role::all();
        return view('layout.register',['roles' => $roles]);
    }

    public function create()
    {
        $roles = Role::all();
        return view('layout.add_account',['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|min:3',
            'username' => 'required|string|max:100|min:3|unique:accounts',
            'phone' => 'required|max:20|min:3',
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|string|email|unique:accounts',
            'role' => 'required',
            'status' => 'nullable'
        ], 
        [
            'name.required' => 'Vui lòng nhập họ và tên !',
            'username.required' => 'Vui lòng nhập tên đăng nhập !',
            'phone.required' => 'Vui lòng nhập số điện thoại !',

            'password.required' => 'Vui lòng nhập mật khẩu !',
            'email.required' => 'Vui lòng nhập email !',

            'name.max:100' => 'Họ và tên quá dài !',
            'name.min:3' => 'Họ và tên quá ngắn !',
            'username.max:20' => 'Tên đăng nhập quá dài !',
            'username.min:3' => 'Tên đăng nhập quá ngắn !',

            'password.min:6' => 'Mật khẩu quá ngắn !',
            'password.confirmed' => 'Nhập lại mật khẩu không khớp !',

            'email.email' => 'Email sai !',
            'email.unique' => 'Email tồn tại !',

        ]);

        $account = new Account([
            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'role' => $request->role,
            'avatar' => 'user.png',
            'status' => $request->status ?? true
        ]);

        $role = Role::where('name', $request->input('role'))->first();
        $role->count += 1;
        $role->save();

        try {
            $account->save();
            return redirect()->route('account')->with('success', 'Thêm tài khoản thành công !');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['registration_error' => 'Thêm không thành công. Vui lòng thử lại sau.']);
        }

    }

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
                    "username.required" => 'Vui lòng nhập tên đăng nhập !',
                    "password.required" => 'Vui lòng nhập mật khẩu !',
                ]
            );

            if (Auth::attempt($data)) {
                // chứa thông tin đăng nhập
                $request->session()->regenerate();
                return redirect()->route('dashboard')->with('success', 'Đăng nhập thành công!');
            }

            return back()->withErrors(['error' => 'Tên đăng nhập hoặc mật khẩu sai !']);
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

        return redirect('login')->with('success', 'Đăng xuất thành công !');
    }

    // ===== INFOMATION ACCOUNT =================================================
    public function user_info()
    {
        $user = Auth::user();

        $username = $user->username;
        $name = $user->name;
        $numberphone = $user->phone;
        $email = $user->email;
        $password = $user->password;
        $role = $user->role;
        $avatar = $user->avatar;

        // Trả về view với dữ liệu người dùng đã lấy được
        return view('layout.user_info', ['name' => $name, 'username' => $username, 'numberphone' => $numberphone, 'email' => $email, 'password' => $password, 'role' => $role, 'avatar' => $avatar]);
    }

    public function account () {
        $accounts = DB::table('accounts')->paginate(9);

        if ($accounts->total() > $accounts->perPage()) {
            return view('layout.account', ['accounts' => $accounts]);
        } else {
            return view('layout.account', ['accounts' => $accounts, 'hidePagination' => true]);
        }
    }

    public function edit($id)
    {
        $roles = Role::all();
        $account = Account::findOrFail($id);
        return view('layout.add_account', compact('account'), ['roles' => $roles]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:100|min:3',
            'username' => 'required|string|max:100|min:3',
            'phone' => 'required|max:20|min:3',
            'password' => 'nullable|string|min:6|confirmed',
            'email' => 'required|string|email',
            'role' => 'required',
            'status' => 'nullable'
        ], 
        [
            'name.required' => 'Vui lòng nhập họ và tên !',
            'username.required' => 'Vui lòng nhập tên đăng nhập !',
            'phone.required' => 'Vui lòng nhập số điện thoại !',

            'password.required' => 'Vui lòng nhập mật khẩu !',
            'email.required' => 'Vui lòng nhập email !',

            'name.max:100' => 'Họ và tên quá dài !',
            'name.min:3' => 'Họ và tên quá ngắn !',
            'username.max:20' => 'Tên đăng nhập quá dài !',
            'username.min:3' => 'Tên đăng nhập quá ngắn !',

            'password.min:6' => 'Mật khẩu quá ngắn !',
            'password.confirmed' => 'Nhập lại mật khẩu không khớp !',

            'email.email' => 'Email sai !',

        ]);
  
        try {
            $accounts = Account::findOrFail($id);
            $accounts->update($request->all());
            return redirect()->route('/account', $accounts)->with('success', 'Cập nhật tài khoản thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Cập nhật tài khoản thất bại!']);
        }
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search_account');

        $accounts = DB::table('accounts')
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%'.$searchTerm.'%')
                    ->orWhere('username', 'like', '%'.$searchTerm.'%')
                    ->orWhere('phone', 'like', '%'.$searchTerm.'%')
                    ->orWhere('email', 'like', '%'.$searchTerm.'%')
                    ->orWhere('role', 'like', '%'.$searchTerm.'%');
            })->paginate(9);
            return view('layout.account', ['accounts' => $accounts, 'searchTerm' => $searchTerm,]);
    }

    public function filter(Request $request)
    {
        $filter_status = $request->input('filter_status');
        $accounts = DB::table('accounts')
        ->when($filter_status, function ($query, $filter_status) {
            return $query->where('status', $filter_status);
        })
        ->paginate(9);
        return view('layout.account', ['accounts' => $accounts]);

    }
}