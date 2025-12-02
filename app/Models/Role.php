<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AdminUser;
use App\Models\Permission;

class Role extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',     
        
    ];
    public function users(){
        return $this->hasMany(AdminUser::class,"role_id");
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class,"role_permissions");
}

}