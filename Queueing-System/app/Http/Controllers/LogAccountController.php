<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AccountLog;
use App\Models\Role;

class LogAccountController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $role = Role::where('name', $user->role)->first();
        if ($role && ($role->hasPermission('manager_account') || $role->hasPermission('all'))) {
            
            $logs = AccountLog::latest()->paginate(9);
        if ($logs->total() > $logs->perPage()) {
            return view('layout.log.manager', ['logs' => $logs]);
        } else {
            return view('layout.log.manager', ['logs' => $logs, 'hidePagination' => true]);
        } 

        } else {
            return redirect()->back()->with('success', 'Bạn không có quyền truy cập!');
        }

        
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search_logs');

        $logs = DB::table('account_logs')
            ->where(function ($query) use ($searchTerm) {$query
                ->where('username', 'like', '%'.$searchTerm.'%')
                ->orWhere('action_time', 'like', '%'.$searchTerm.'%')
                ->orWhere('ip_address', 'like', '%'.$searchTerm.'%')
                ->orWhere('action', 'like', '%'.$searchTerm.'%');
            })->paginate(9);
            return view('layout.log.manager', ['logs' => $logs, 'searchTerm'  =>$searchTerm]);
    }
    public function filter(Request $request)
    {
    
        $dateStart = $request->input('dateStart');
        $dateEnd = $request->input('dateEnd');

        $logs = DB::table('account_logs')
        ->when($dateStart && $dateEnd, function ($query) use ($dateStart, $dateEnd) {
            return $query->whereBetween('created_at', [$dateStart, $dateEnd]);
        })
        ->paginate(9);
        return view('layout.log.manager', ['logs' => $logs]);

    }
}