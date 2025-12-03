<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use App\Models\Permission;

class PermissionRole extends Model
{
      use SoftDeletes;
      protected $table = 'role_permissions';
     protected $fillable = [
        'name',        
        'role_id',
        'permission_id'
    ];
      public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
