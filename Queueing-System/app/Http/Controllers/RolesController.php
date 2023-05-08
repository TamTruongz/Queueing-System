<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function role()
    {
        $roles = DB::table('roles')->paginate(9);

        if ($roles->total() > $roles->perPage()) {
            return view('layout.role', ['roles' => $roles]);
        } else {
            return view('layout.role', ['roles' => $roles, 'hidePagination' => true]);
        }
    }

    public function create()
    {
        return view('layout.add_role');
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

        $role->save();

        return redirect()->route('role')->with('success', 'Vai trò đã được tạo thành công!');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('layout.add_role', compact('role'));
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

        $role->save();

        return redirect()->route('role')->with('success', 'Vai trò đã được cập nhật thành công!');
    }
}