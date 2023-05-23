<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'permissions'];

    public function accounts()
    {
        return $this->hasMany(Account::class, 'role', 'name');
    }

    public function hasPermission($permission)
    {
        $permissions = json_decode($this->permissions, true);
        return in_array($permission, $permissions) || in_array('all', $permissions);
    }

}