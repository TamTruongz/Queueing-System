<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menubar extends Model
{
    use HasFactory;
    protected $table = 'menubars';
    protected $fillable = [
        'name',
        'route',
        'icon'
    ];
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;
}
