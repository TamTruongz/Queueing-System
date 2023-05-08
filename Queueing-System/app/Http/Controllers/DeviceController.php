<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Device;


class DeviceController extends Controller
{
    public function device()
    {
        $devices = DB::table('devices')->paginate(9);
        if ($devices->total() > $devices->perPage()) {
            return view('layout.device', ['devices' => $devices]);
        } else {
            return view('layout.device', ['devices' => $devices, 'hidePagination' => true]);
        }
    }

    public function create()
    {
        return view('layout.add_device');
    }

    public function store(Request $request)
    {

        $request->validate([
            'device_id' => 'required',
            'name' => 'required',
            'username' => 'required',
            'device_type' => 'required',
            'address' => 'required',
            'service_use' => 'required',
            'password' => 'required'
        ]);

        try {
            $device = Device::create($request->all());
            return redirect()->route('device', $device)->with('success', 'Thêm thiết bị thành công !');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Thêm thiết bị thất bại !']);
        }
    }

    public function edit($id)
    {
        $device = Device::findOrFail($id);
        return view('layout.update_device', compact('device'));
    }

    public function update(Request $request, $id)
    {
        $device = Device::findOrFail($id);

        $device->device_id = $request->get('device_id');
        $device->name = $request->get('name');
        $device->username = $request->get('username');
        $device->device_type = $request->get('device_type');
        $device->address = $request->get('address');
        $device->password = $request->get('password');
        $device->service_use = $request->get('service_use');

        $device->save();

        return redirect('/device')->with('success', 'Device has been updated');
    }

    public function info($id)
    {
        $device = Device::findOrFail($id);
        return view('layout.info_device', compact('device'));
    }
}