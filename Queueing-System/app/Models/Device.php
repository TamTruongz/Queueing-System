<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $table = 'devices';

    protected $fillable = [
        'device_id',
        'name',
        'username',
        'address',
        'device_type',
        'active_status',
        'connect_status',
        'service_use',
        'password',
    ];
}
