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
    public function dashboard()
    {
        $devices = Device::all();
        $services = Service::all();
        $tickets = Ticket::all();
        $roles = Role::all();

    return view('layout.dashboard.index', ['devices' => $devices, 'services' => $services, 'tickets' => $tickets, 'roles' => $roles]);
    }
}