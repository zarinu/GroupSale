<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'caption', 'guard_name', 'description'];
    const UPDATED_AT = null;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles')->withTimestamps();
    }

}