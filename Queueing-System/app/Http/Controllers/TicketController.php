<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function ticket()
    {
        $tickets = DB::table('tickets')->paginate(9);
        if ($tickets->total() > $tickets->perPage()) {
            return view('layout.codes', ['tickets' => $tickets]);
        } else {
            return view('layout.codes', ['tickets' => $tickets, 'hidePagination' => true]);
        }
    }
    public function create()
    {
        
        return view('layout.codes_new');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $ticket = new Ticket();
        $ticket->name = $user->username;
        $ticket->service_name = $request->input('service_name');
        $ticket->sequence_number = Ticket::max('sequence_number') + 1;
        $ticket->issued_at = Carbon::now();
        $ticket->expired_at = Carbon::now()->addHours(8);
        $ticket->source = 'system';
        $ticket->status = 'pending';
        $ticket->phone = $user->numberphone;
        $ticket->email =$user->email;
        $ticket->save();

        // return response()->json([
        //     'success' => true,
        //     'data' => $ticket,
        // ]);
        return redirect()->route('ticket', $ticket);
    }

    public function info($id)
    {
        $tickets = Ticket::findOrFail($id);
        return view('layout.info_codes', compact('tickets'));
    }

    // public function show($id)
    // {
    //     $ticket = Ticket::find($id);
    //     if (!$ticket) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Ticket not found',
    //         ], 404);
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'data' => $ticket,
    //     ]);
    // }
}