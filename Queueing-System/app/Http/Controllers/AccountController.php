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
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:accounts',
            'phone' => 'nullable|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'email' => 'required|string|email|unique:accounts',
            'role' => 'required',
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
            return redirect()->route('login')->with('success', 'Đăng ký thành công !');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['registration_error' => 'Đăng ký không thành công. Vui lòng thử lại sau.']);
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
                    "username.required" => 'Không được để trống tên đăng nhập',
                    "password.required" => 'Không được để trống mật khẩu',
                ]
            );

            if (Auth::attempt($data)) {
                // chứa thông tin đăng nhập
                $request->session()->regenerate();
                return redirect()->route('dashboard')->with('success', 'Đăng nhập thành công!');
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
            'service_code' => 'required|string|max:255|unique:services,service_code,' . $service->id,
            'service_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'auto_increment' => 'nullable|boolean',
            'prefix' => 'nullable|boolean',
            'suffix' => 'nullable|boolean',
            'reset_daily' => 'nullable|boolean',
            'at_least_one_selected' => 'required_without_all:auto_increment,prefix,suffix,reset_daily',
        ]);
  
        try {
            $service->update($request->all());
            return redirect()->route('/service', $service)->with('success', 'Cập nhật dịch vụ thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Cập nhật dịch vụ thất bại!']);
        }
    }


}