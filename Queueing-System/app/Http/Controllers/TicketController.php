<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Account;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function ticket()
    {
        $service = Service::all();
        $tickets = DB::table('tickets')->paginate(9);
        if ($tickets->total() > $tickets->perPage()) {
            return view('layout.codes', ['tickets' => $tickets, 'services' => $service]);
        } else {
            return view('layout.codes', ['tickets' => $tickets,'services' => $service, 'hidePagination' => true]);
        }
    }
    public function create()
    {
        $service = Service::all();
        return view('layout.codes_new',['service' => $service]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $ticket = new Ticket();
        $ticket->name = $user->username;
        $ticket->service_name = $request->input('service_name');
        $ticket->sequence_number = Ticket::max('sequence_number') + 1;
        $ticket->issued_at = Carbon::now()->format('Y-m-d H:i:s');
        $ticket->expired_at = Carbon::now()->addHours(8)->format('Y-m-d H:i:s');
        $ticket->source = 'system';
        $ticket->status = 'pending';
        $ticket->phone = $user->phone;
        $ticket->email =$user->email;

        $ticket->save();
        $service = Service::all();
        $latestTicket = Ticket::latest()->first();
        return response()->json([
            'latestTicket' => $latestTicket,
        ]);
        return view('layout.codes_new', ['service' => $service]);
    }

    public function info($id)
    {
        $tickets = Ticket::findOrFail($id);
        return view('layout.info_codes', compact('tickets'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search_ticket');
        $services = Service::all();
        $tickets = DB::table('tickets')
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%'.$searchTerm.'%')
                    ->orWhere('service_name', 'like', '%'.$searchTerm.'%')
                    ->orWhere('issued_at', 'like', '%'.$searchTerm.'%')
                    ->orWhere('expired_at', 'like', '%'.$searchTerm.'%');
            })->paginate(9);
            
            $request->session()->put('searchTerm', $searchTerm);
            return view('layout.codes', ['tickets' => $tickets, 'services' => $services, 'searchTerm' =>$searchTerm]);
    }

    public function filter(Request $request)
    {
        
        $filter_name = $request->input('filter_name');
        $filter_status = $request->input('filter_status');
        $filter_source = $request->input('filter_source');

        $services = Service::all();
        $tickets = DB::table('tickets')

        ->when($filter_name, function ($query, $filter_name) {
            return $query->where('service_name', $filter_name);
        })
        ->when($filter_status, function ($query, $filter_status) {
            return $query->where('status', $filter_status);
        })
        ->when($filter_source, function ($query, $filter_source) {
            return $query->where('source', $filter_source);
        })
        ->paginate(9);
        return view('layout.codes', ['tickets' => $tickets, 'services' => $services]);

    }
}