<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function __construct()
    {
    $this->middleware('log_account_actions')->only(['store', 'update']);
    }

    public function role()
    {
        $roles = DB::table('roles')->paginate(9);

        if ($roles->total() > $roles->perPage()) {
            return view('layout.role.manager', ['roles' => $roles]);
        } else {
            return view('layout.role.manager', ['roles' => $roles, 'hidePagination' => true]);
        }
    }

    public function create()
    {
        return view('layout.role.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:roles',
            'description' => 'nullable',
            'permissions' => 'required',
        ],
        [
            'name.required' => 'Vui lòng nhập tên vai trò.',
            'name.max:255' => 'Tên vai trò quá dài',
            'name.unique' => 'Tên vai trò đã tồn tại.',
            'permissions.required' => 'Vui lòng chọn ít nhất một quyền hạn.',
        ]);

        $role = new Role;
        $role->name = $validatedData['name'];
        $role->description = $validatedData['description'];
        $role->permissions = json_encode($request->input('permissions'));
        try {
            $this->middleware('log_account_actions');
            $role->save();
            return redirect()->route('role')->with('success', 'Vai trò đã được tạo thành công!');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Thêm vai trò thất bại']);
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('layout.role.create', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'permissions' => 'nullable|array',
        ],
        [
            'name.required' => 'Vui lòng nhập tên vai trò.',
            'name.max:255' => 'Tên vai trò quá dài',
            'permissions.required' => 'Vui lòng chọn ít nhất một quyền hạn.',
        ]);

        $role = Role::findOrFail($id);

        $role->name = $validatedData['name'];
        $role->description = $validatedData['description'];
        $role->permissions = json_encode($request->input('permissions'));
        try {
            $this->middleware('log_account_actions');
            $role->save();
            return redirect()->route('role')->with('success', 'Vai trò đã được cập nhật thành công!');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Cập nhật vai trò thất bại']);
        }
        

    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search_role');

        $roles = DB::table('roles')
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%'.$searchTerm.'%')
                    ->orWhere('count', 'like', '%'.$searchTerm.'%')
                    ->orWhere('description', 'like', '%'.$searchTerm.'%');
            })->paginate(9);
            return view('layout.role.manager', ['roles' => $roles, 'searchTerm'=>$searchTerm]);
    }
}