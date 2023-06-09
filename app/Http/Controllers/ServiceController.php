<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Service;
use App\Models\Role;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('log_account_actions')->only(['store', 'update']);
    }
    
    public function service()
    {
        $services = Service::latest()->paginate(9);
        if ($services->total() > $services->perPage()) {
            return view('layout.service.manager', ['services' => $services]);
        } else {
            return view('layout.service.manager', ['services' => $services, 'hidePagination' => true]);
        }
    }

    public function create()
    {
        $user = auth()->user();
        $role = Role::where('name', $user->role)->first();
        if ($role && ($role->hasPermission('add') || $role->hasPermission('all'))) {
            return view('layout.service.create');
        } else {
            return redirect()->back()->with('success', 'Bạn không có quyền truy cập!');
        }
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_code' => 'required|string|max:255|unique:services',
            'service_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'auto_increment' => 'nullable|boolean',
            'prefix' => 'nullable|boolean',
            'surfix' => 'nullable|boolean',
            'reset_daily' => 'nullable|boolean',
            'at_least_one_selected' => 'required_without_all:auto_increment,prefix,suffix,reset_daily',
        ], [
            'service_code.required'=> 'Vui lòng nhập mã dịch vụ !',
            'service_code.max:255'=> 'Mã dịch vụ quá dài !',
            'service_code.unique'=> 'Mã dịch vụ tồn tại !',
            'service_name.required'=> 'Vui lòng nhập tên dịch vụ !',
            'at_least_one_selected.required_without_all'=> 'Vui lòng chọn ít nhất 1 trường !',
        ]);

        try {
            $this->middleware('log_account_actions');
            $service = Service::create($request->all());
            return redirect()->route('service', $service)->with('success', 'Thêm dịch vụ thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Thêm dịch vụ thất bại!']);
        }
    }

    public function edit($id)
    {
        $user = auth()->user();
        $role = Role::where('name', $user->role)->first();
        if ($role && ($role->hasPermission('edit') || $role->hasPermission('all'))) {
            $service = Service::findOrFail($id);
            return view('layout.service.create', compact('service'));
        } else {
            return redirect()->back()->with('success', 'Bạn không có quyền truy cập!');
        }
        
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'service_code' => 'required|string|max:255',
            'service_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'auto_increment' => 'nullable|boolean',
            'prefix' => 'nullable|boolean',
            'surfix' => 'nullable|boolean',
            'reset_daily' => 'nullable|boolean',
            'at_least_one_selected' => 'required_without_all:auto_increment,prefix,suffix,reset_daily',
        ]);
    
        $data['auto_increment'] = $request->has('auto_increment') ? true : false;
        $data['prefix'] = $request->has('prefix') ? true : false;
        $data['surfix'] = $request->has('surfix') ? true : false;
        $data['reset_daily'] = $request->has('reset_daily') ? true : false;

        $service = Service::findOrFail($id);
        try {
            $this->middleware('log_account_actions');
            $service->update($data);
            return redirect()->route('service', $service)->with('success', 'Cập nhật dịch vụ thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Cập nhật dịch vụ thất bại!']);
        }
        
       
    }

    public function info($id)
    {
        $service = Service::findOrFail($id);
        $tickets = Ticket::latest()->paginate(8);
        if ($tickets->total() > $tickets->perPage()) {
            return view('layout.service.info',['tickets' => $tickets], compact('service'));
        } else {
            return view('layout.service.info', ['tickets' => $tickets,'hidePagination' => true], compact('service'));
        }
        
    }
    public function searchinfo(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $searchTerm = $request->input('search_ticket_info');

        $tickets = DB::table('tickets')
            ->where(function ($query) use ($searchTerm) {
                $query->where('id', 'like', '%'.$searchTerm.'%')
                    ->orWhere('status', 'like', '%'.$searchTerm.'%');
            })->paginate(8);
            if ($tickets->total() > $tickets->perPage()) {
                return view('layout.service.info',['tickets' => $tickets], compact('service'));
            } else {
                return view('layout.service.info', ['tickets' => $tickets, 'hidePagination' => true],compact('service'));
            }
    }

    public function filterinfo(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $dateStart = $request->input('dateStart');
        $dateEnd = $request->input('dateEnd');
        $filter_status_info = $request->input('filter_status_info');

        

        $tickets = DB::table('tickets')
        ->when($filter_status_info, function ($query, $filter_status_info) {
            return $query->where('status', $filter_status_info);
        })
        ->when($dateStart && $dateEnd, function ($query) use ($dateStart, $dateEnd) {
            return $query->whereBetween('created_at', [$dateStart, $dateEnd]);
        })
        ->paginate(8);
        return view('layout.service.info', ['tickets' => $tickets], compact('service'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search_service');

        $services = DB::table('services')
            ->where(function ($query) use ($searchTerm) {
                $query->where('service_code', 'like', '%'.$searchTerm.'%')
                    ->orWhere('service_name', 'like', '%'.$searchTerm.'%')
                    ->orWhere('description', 'like', '%'.$searchTerm.'%');
            })->paginate(9);
            return view('layout.service.manager', ['services' => $services, 'searchTerm'=>$searchTerm]);
    }

    public function filter(Request $request)
    {
        $filter_status = $request->input('filter_status');

        $dateStart = $request->input('dateStart');
        $dateEnd = $request->input('dateEnd');

        $services = DB::table('services')
        ->when($filter_status, function ($query, $filter_status) {
            return $query->where('status', $filter_status);
        })
        ->when($dateStart && $dateEnd, function ($query) use ($dateStart, $dateEnd) {
            return $query->whereBetween('created_at', [$dateStart, $dateEnd]);
        })
        ->paginate(9);
        return view('layout.service.manager', ['services' => $services], compact('filter_status', 'dateStart', 'dateEnd'));

    }
}