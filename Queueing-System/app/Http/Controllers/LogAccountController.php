<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AccountLog;

class LogAccountController extends Controller
{
    public function index()
{
    $logs = AccountLog::latest()->paginate(9);
    if ($logs->total() > $logs->perPage()) {
        return view('layout.log.manager', ['logs' => $logs]);
    } else {
        return view('layout.log.manager', ['logs' => $logs, 'hidePagination' => true]);
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
}