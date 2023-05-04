<?php

namespace App\CRUD;

use App\Models\Account;
use Illuminate\Support\Str;

class _Account
{
    public function insert($data)
    {
        try {
            Account::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'password' => $data['password'],
                'email' => $data['email'],
                'numberphone' => $data['numberphone'],
                'role' => $data['role'],
                'avatar' => $data['avatar']
            ]);

            return 'Thêm dữ liệu thành công';
        } catch (\Exception $th) {
            return $th;
        }

        return 'Lỗi thêm dữ liệu';
    }

    // Get all table
    public function getAccountAll()
    {
        return Account::all();
    }

    // Tìm Kiếm
    public function getAccountSearch($flied, $value)
    {
        return Account::where($flied, 'like', '%' . $value . '%')->get();
    }

    // Sửa dữ liệu
    public function editData($flied, $value, $newValue)
    {
        try {
            $data =  Account::where($flied, $value);
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
            Account::where($flied, $value)->delete();
            return 'Xóa thành công';
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
