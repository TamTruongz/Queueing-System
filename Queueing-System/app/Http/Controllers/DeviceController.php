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
            'device_id' => 'required|max:255',
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'device_type' => 'required',
            'address' => 'required|max:255',
            'service_use' => 'required|max:255',
            'password' => 'required|max:255'
        ],
        [
            'device_id.required' => 'Vui lòng nhập mã thiết bị !',
            'device_id.max:255' => 'Mã thiết bị quá dài !',
            'name.required' => 'Vui lòng nhập tên thiết bị !',
            'name.max:255' => 'Tên thiết bị quá dài !',
            'username.max:255' => 'Tên đăng nhập quá dài',
            'username.required' => 'Vui lòng nhập đăng nhập !',
            'device_type.required' => 'Vui lòng chọn loại thiết bị !',
            'address.required' => 'Vui lòng nhập địa chỉ IP !',
            'address.max:255' => 'Địa chỉ quá dài !',
            'service_use.required' => 'Vui lòng nhập dịch vụ sử dụng !',
            'service_use.max:255' => 'Nội dung quá dài !',
            'password' => 'Vui lòng nhập mật khẩu !',
            'password.max:255' => 'Vui lòng nhập mật khẩu !',
        ]);

        try {
            $device = Device::create($request->all());
            return redirect()->route('device', $device)->with('success', 'Thêm thiết bị thành công !');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error', 'Thêm thiết bị thất bại !']);
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

        $request->validate([
            'device_id' => 'required|max:255',
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'device_type' => 'required',
            'address' => 'required|max:255',
            'service_use' => 'required|max:255',
            'password' => 'required|max:255'
        ],
        [
            'device_id.required' => 'Vui lòng nhập mã thiết bị !',
            'device_id.max:255' => 'Mã thiết bị quá dài !',
            'name.required' => 'Vui lòng nhập tên thiết bị !',
            'name.max:255' => 'Tên thiết bị quá dài !',
            'username.max:255' => 'Tên đăng nhập quá dài',
            'username.required' => 'Vui lòng nhập đăng nhập !',
            'device_type.required' => 'Vui lòng chọn loại thiết bị !',
            'address.required' => 'Vui lòng nhập địa chỉ IP !',
            'address.max:255' => 'Địa chỉ quá dài !',
            'service_use.required' => 'Vui lòng nhập dịch vụ sử dụng !',
            'service_use.max:255' => 'Nội dung quá dài !',
            'password' => 'Vui lòng nhập mật khẩu !',
            'password.max:255' => 'Vui lòng nhập mật khẩu !',
        ]);
        $device->device_id = $request->get('device_id');
        $device->name = $request->get('name');
        $device->username = $request->get('username');
        $device->device_type = $request->get('device_type');
        $device->address = $request->get('address');
        $device->password = $request->get('password');
        $device->service_use = $request->get('service_use');
        try {
            $device->save();
            return redirect('/device')->with('success', 'Cập nhật thiết bị thành công !');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Cập nhật thiết bị thất bại !']);
        }

    }

    public function info($id)
    {
        $device = Device::findOrFail($id);
        return view('layout.info_device', compact('device'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search_device');

        $devices = DB::table('devices')
            ->where(function ($query) use ($searchTerm) {
                $query->where('device_id', 'like', '%'.$searchTerm.'%')
                    ->orWhere('name', 'like', '%'.$searchTerm.'%')
                    ->orWhere('address', 'like', '%'.$searchTerm.'%')
                    ->orWhere('service_use', 'like', '%'.$searchTerm.'%');
            })->paginate(9);
            return view('layout.device', ['devices' => $devices, 'searchTerm'=>$searchTerm]);
    }

    public function filter(Request $request)
    {
        $filter_status = $request->input('filter_status');
        $filter_connect = $request->input('filter_connect');


        $devices = DB::table('devices')
        ->when($filter_status, function ($query, $filter_status) {
            return $query->where('active_status', $filter_status);
        })
        ->when($filter_connect, function ($query, $filter_connect) {
            return $query->where('connect_status', $filter_connect);
        })
        ->paginate(9);
        return view('layout.device', ['devices' => $devices]);

    }
}