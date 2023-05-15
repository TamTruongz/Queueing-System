<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountLog extends Model
{
    use HasFactory;

    protected $table = 'account_logs';

    protected $fillable = [
        'username', 
        'action_time', 
        'ip_address',
        'action'
    ];
}