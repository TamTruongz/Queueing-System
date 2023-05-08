<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'service_name',
        'sequence_number',
        'issued_at',
        'expired_at',
        'source',
        'status',
        'phone',
        'email',
    ];

    protected $casts = [
        'issued_at' => 'datetime',
        'expired_at' => 'datetime',
    ];
}