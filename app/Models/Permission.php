<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Feature;
use App\Models\Role;

class Permission extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',        
        'feature_id'        
    ];

    public function feature(){
        return  $this->belongsTo(Feature::class,'feature_id', 'id');
                    //   ->with("role:name");
    }
    public function roles(){
        return $this->belongsToMany(Role::class,"role_permissions");
}
}
