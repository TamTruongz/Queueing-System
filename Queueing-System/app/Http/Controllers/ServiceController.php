<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    public function service()
    {
        $services = DB::table('services')->paginate(9);
        if ($services->total() > $services->perPage()) {
            return view('layout.service', ['services' => $services]);
        } else {
            return view('layout.service', ['services' => $services, 'hidePagination' => true]);
        }
    }

    public function create()
    {
        return view('layout.add_service');
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
        ]);

        try {
            $service = Service::create($request->all());
            return redirect()->route('service', $service)->with('success', 'Thêm dịch vụ thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Thêm dịch vụ thất bại!']);
        }
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('layout.add_service', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        // $request->validate([
        //     'service_code' => 'required|string|max:255',
        //     'service_name' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'auto_increment' => 'nullable|boolean',
        //     'prefix' => 'nullable|boolean',
        //     'suffix' => 'nullable|boolean',
        //     'reset_daily' => 'nullable|boolean',
        //     'at_least_one_selected' => 'required_without_all:auto_increment,prefix,suffix,reset_daily',
        // ]);
        $service->service_code = $request->get('service_code');
        $service->service_name = $request->get('service_name');
        $service->description = $request->get('description');
        $service->auto_increment = $request->get('auto_increment');
        $service->prefix = $request->get('prefix');
        $service->suffix = $request->get('suffix');
        $service->reset_daily = $request->get('reset_daily');  
        try {
            $service->save();
            return redirect()->route('/service', $service)->with('success', 'Cập nhật dịch vụ thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Cập nhật dịch vụ thất bại!']);
        }
    }

    public function info($id)
    {
        $service = Service::findOrFail($id);
        return view('layout.info_service', compact('service'));
    }

    // public function destroy(Service $service)
    // {
    //     $service->delete();

    //     return redirect()->route('services.index');
    // }
}