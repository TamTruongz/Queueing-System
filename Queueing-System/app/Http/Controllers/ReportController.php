<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function report(Request $request)
    {

        $filter_ticket = Ticket::all();
        $filter_service = Service::all();


        $codeid = $request->input('codeid'); // stt
        $selectedServices = $request->input('service'); // tên dịch vụ
        $selectedTime = $request->input('time'); // thời gian cấp
        $selectedStatus = $request->input('status'); // trạng thái
    
        $tickets = Ticket::latest()
            ->when($codeid, function ($query, $codeid) {
                return $query->where('id', $codeid);
            })
            ->when($selectedServices, function ($query, $selectedServices) {
                return $query->whereIn('service_name', $selectedServices);
            })
            ->when($selectedTime, function ($query, $selectedTime) {
                return $query->where('time', $selectedTime);
            })
            ->when($selectedStatus, function ($query, $selectedStatus) {
                return $query->where('status', $selectedStatus);
            })
            ->paginate(9);
        
        
        if ($tickets->total() > $tickets->perPage()) {
            return view('layout.report.manager', ['tickets' => $tickets, 'filter_ticket' => $filter_ticket, 'filter_service' => $filter_service ]);
        } else {
            return view('layout.report.manager', ['tickets' => $tickets, 'filter_ticket' => $filter_ticket, 'filter_service' => $filter_service, 'hidePagination' => true]);
        }  
    }
    
}