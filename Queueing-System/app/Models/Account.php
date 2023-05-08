<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
class Account extends Model implements Authenticatable
{
    use HasFactory;
    
    protected $table = 'accounts';

    protected $fillable = [
        'name',
        'username',
        'phone',
        'email',
        'password',
        'role',
        'status',
        'avatar'
    ];

    protected $guarded = [
        'id',
    ];

    public $timestamps = false;
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function isActive()
    {
        return $this->status == true;
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role', 'name');
    }
}