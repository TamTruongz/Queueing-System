<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function report()
    {
        $tickets = DB::table('tickets')->paginate(9);
        if ($tickets->total() > $tickets->perPage()) {
            return view('layout.report', ['tickets' => $tickets]);
        } else {
            return view('layout.report', ['tickets' => $tickets, 'hidePagination' => true]);
        }
    }
}