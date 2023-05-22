<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function report(Request $request)
    {

        $filter_ticket = Ticket::all();
        $filter_service = Service::all();

        $tickets = Ticket::latest()->paginate(10);

        if ($tickets->total() > $tickets->perPage()) {
            return view('layout.report.manager', ['tickets' => $tickets, 'filter_ticket' => $filter_ticket, 'filter_service' => $filter_service ]);
        } else {
            return view('layout.report.manager', ['tickets' => $tickets, 'filter_ticket' => $filter_ticket, 'filter_service' => $filter_service, 'hidePagination' => true]);
        }  
    }
    public function filter(Request $request) {
        
        $filter_ticket = Ticket::all();
        $filter_service = Service::all();

        $tickets = Ticket::all();
        $codeid = $request->input('codeid'); // stt
        $selectedServices = $request->input('service'); // tên dịch vụ
        $selectedTime = $request->input('time'); // thời gian cấp
        $selectedStatus = $request->input('status'); // trạng thái
        $selectedSource = $request->input('source'); // nguồn cấp

        $dateStart = $request->input('dateStart'); // ngày bắt đầu
        $dateEnd = $request->input('dateEnd'); //ngày kết thúc
    
        $tickets = Ticket::latest()
            ->when($codeid, function ($query, $codeid) {
                return $query->where('id', $codeid);
            })
            ->when($selectedServices, function ($query, $selectedServices) {
                return $query->whereIn('service_name', $selectedServices);
            })
            ->when($selectedTime, function ($query, $selectedTime) {
                return $query->where('issued_at', $selectedTime);
            })
            ->when($selectedStatus, function ($query, $selectedStatus) {
                return $query->where('status', $selectedStatus);
            })
            ->when($selectedSource, function ($query, $selectedSource) {
                return $query->where('source', $selectedSource);
            })
            ->when($dateStart && $dateEnd, function ($query) use ($dateStart, $dateEnd) {
                return $query->whereBetween('created_at', [$dateStart, $dateEnd]);
            })
            ->paginate(10);
        
            return view('layout.report.manager', ['tickets' => $tickets, 'filter_ticket' => $filter_ticket, 'filter_service' => $filter_service ], compact('selectedStatus', 'selectedSource')); 
    }

}