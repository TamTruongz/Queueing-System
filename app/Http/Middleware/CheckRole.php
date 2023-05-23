<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$permissions)
    {

        $user = auth()->user();
        $role = Role::where('name', $user->role)->first();
        foreach ($permissions as $permission) {
            if ($role && ($role->hasPermission($permission))) {
                return  $next($request);
            } 
        }
        return redirect()->back()->with('success', 'Bạn không có quyền truy cập!');
    }
}