<?php

namespace App\CRUD;

use App\Models\Menubar;
use Illuminate\Support\Str;

class _Menubar
{
    public function insert($data)
    {
        try {
            Menubar::create([
                'name' => $data['name'],
                'route' => $data['route'],
                'icon' => $data['icon']
            ]);

            return 'Thêm dữ liệu thành công';
        } catch (\Exception $th) {
            return $th;
        }

        return 'Lỗi thêm dữ liệu';
    }

    // Get all table
    public function getMenubarAll()
    {
        return Menubar::all();
    }

    // Tìm Kiếm
    public function getMenubarSearch($flied, $value)
    {
        return Menubar::where($flied, 'like', '%' . $value . '%')->get();
    }

    // Sửa dữ liệu
    public function editData($flied, $value, $newValue)
    {
        try {
            $data =  Menubar::where($flied, $value);
            $data->update(['name' => $newValue]);
            return 'Sữa thành công';
        } catch (\Throwable $th) {
            return $th;
        }
    }

    // Xóa dữ liệu
    public function deleteData($flied, $value)
    {
        try {
            Menubar::where($flied, $value)->delete();
            return 'Xóa thành công';
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
