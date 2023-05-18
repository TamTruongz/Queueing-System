<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Device;
use App\Models\Service;
use App\Models\Ticket;
use App\Models\Account;
use App\Models\Role;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $devices = Device::all();
        $services = Service::all();
        $tickets = Ticket::all();
        $roles = Role::all();

        // biểu đồ
        $selectedDate = $request->input('filterDate'); // thời gian cấp

        $currentMonth = date('m');
        $currentYear = date('Y');
        $numDays = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

        $labels = [];
        $counts = [];


       
        // Tuần
        if($selectedDate == 'Tuần') {
            for ($weekNumber = 1; $weekNumber <= 4; $weekNumber++) {
                $startDate = date('Y-m-d', strtotime("$currentYear-$currentMonth-01 +".($weekNumber-1)." week"));
                $endDate = date('Y-m-d', strtotime("$startDate +1 week -1 day"));
                $ticketsOfWeek = Ticket::whereBetween('issued_at', [$startDate, $endDate])->get();
                $count = count($ticketsOfWeek);
                $labels[] = "Tuần $weekNumber";
                $counts[] = $count;
            }
        }
        // Tháng
        else if ($selectedDate == 'Tháng') {
            for ($months = 1; $months <= 12; $months++) {
                $startDate = date('Y-m-d', strtotime("$currentYear-$months-01")); // Ngày bắt đầu của tháng
                $endDate = date('Y-m-t', strtotime("$currentYear-$months-01")); // Ngày kết thúc của tháng
                $ticketsOfMonth = Ticket::whereBetween('issued_at', [$startDate, $endDate])->get();
                $count = count($ticketsOfMonth);
                $labels[] = $months;
                $counts[] = $count;
            }
        }
        // Ngày
        else {
            for ($day = 1; $day <= $numDays; $day++) {
                $date = sprintf('%d-%02d-%02d', $currentYear, $currentMonth, $day);
                $ticketsOfDay = Ticket::whereDate('issued_at', $date)->get();
                $count = count($ticketsOfDay);
                $labels[] = sprintf('%02d', $day);
                $counts[] = $count;
            }
        }
       


        
        return view('layout.dashboard.index', [
            'devices' => $devices, 
            'services' => $services,
            'tickets' => $tickets, 
            'roles' => $roles,
            'labels' => $labels,
            'counts' => $counts,
        ]);
    }
}