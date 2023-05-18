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
    public function __construct(public Account $account)
    {
        $this->middleware('log_account_actions')->only(['store', 'update']);
    }
    // ===== REGISTER =================================================
    // public function register()
    // {
    //     $roles = Role::all();
    //     return view('layout.register',['roles' => $roles]);
    // }

    public function create()
    {
        $user = auth()->user();
        $role = Role::where('name', $user->role)->first();
        if ($role && ($role->hasPermission('manager_account') || $role->hasPermission('all'))) {
            $roles = Role::all();
        return view('layout.account.create',['roles' => $roles]);
        } else {
            return redirect()->back()->with('success', 'Bạn không có quyền truy cập!');
        }
        
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
            $this->middleware('log_account_actions');
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

            return back()->withErrors(['login' => 'Tên đăng nhập hoặc mật khẩu sai !']);
        }
        return view('layout.account.login');
    }


    // ===== LOGOUT =================================================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('ticket.create')->with('success', 'Đăng xuất thành công !');
    }

    // ===== INFOMATION ACCOUNT =================================================
    public function info()
    {
        $user = Auth::user();

        $username = $user->username;
        $name = $user->name;
        $numberphone = $user->phone;
        $email = $user->email;
        $password = $user->password;
        $role = $user->role;
        $avatar = $user->avatar;

        return view('layout.account.info', ['name' => $name, 'username' => $username, 'numberphone' => $numberphone, 'email' => $email, 'password' => $password, 'role' => $role, 'avatar' => $avatar]);
    }

    public function account () {
        $user = auth()->user();
        $role = Role::where('name', $user->role)->first();
        if ($role && ($role->hasPermission('manager_account') || $role->hasPermission('all'))) {
            $accounts = Account::latest()->paginate(9);
        if ($accounts->total() > $accounts->perPage()) {
            return view('layout.account.manager', ['accounts' => $accounts]);
        } else {
            return view('layout.account.manager', ['accounts' => $accounts, 'hidePagination' => true]);
        }
        } else {
            return redirect()->back()->with('success', 'Bạn không có quyền truy cập!');
        }
        
    }

    public function edit($id)
    {
        $user = auth()->user();
        $role = Role::where('name', $user->role)->first();
        if ($role && ($role->hasPermission('manager_account') || $role->hasPermission('all'))) {
            $roles = Role::all();
            $account = Account::findOrFail($id);
            return view('layout.account.create', compact('account'), ['roles' => $roles]);
        } else {
            return redirect()->back()->with('success', 'Bạn không có quyền truy cập!');
        }
       
    }

    public function update(Request $request, $id)
    {
    

    $request->validate([
        'name' => 'required|string|max:255|min:3',
        'username' => 'required|string|max:255|min:3',
        'phone' => 'required|max:255|min:3',
        'password' => 'nullable|string|min:6|confirmed',
        'email' => 'required|string|email',
        'role' => 'required',
        'status' => 'nullable'
    ], 
    [
        'name.required' => 'Vui lòng nhập họ và tên !',
        'username.required' => 'Vui lòng nhập tên đăng nhập !',
        'phone.required' => 'Vui lòng nhập số điện thoại !',
        'email.required' => 'Vui lòng nhập email !',

        'name.max:255' => 'Họ và tên quá dài !',
        'name.min:3' => 'Họ và tên quá ngắn !',
        'username.max:255' => 'Tên đăng nhập quá dài !',
        'username.min:3' => 'Tên đăng nhập quá ngắn !',
        'email.email' => 'Email sai !',
    ]);
    $account = Account::findOrFail($id);
    $oldRole = $account->role;
    $newRole = $request->get('role');

    if ($oldRole != $newRole) {
        $oldRoleObj = Role::where('name', $oldRole)->first();
        $oldRoleObj->count -= 1;
        $oldRoleObj->save();

        $newRoleObj = Role::where('name', $newRole)->first();
        $newRoleObj->count += 1;
        $newRoleObj->save();
    }

    $account->name = $request->get('name');
    $account->username = $request->get('username');
    $account->phone = $request->get('phone');
    if ($request->filled('password')) {
        $account->password = $request->input('password');
    }
    $account->email = $request->get('email');
    $account->role = $request->get('role');
    $account->status = $request->get('status');

    try {
        $this->middleware('log_account_actions');
        $account->save();
        return redirect('/account')->with('success', 'Cập nhật tài khoản thành công!');
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
            return view('layout.account.manager', ['accounts' => $accounts, 'searchTerm' => $searchTerm,]);
    }

    public function filter(Request $request)
    {
        $filter_status = $request->input('filter_status');
        $accounts = DB::table('accounts')
        ->when($filter_status, function ($query, $filter_status) {
            return $query->where('status', $filter_status);
        })
        ->paginate(9);
        return view('layout.account.manager', ['accounts' => $accounts]);

    }
}