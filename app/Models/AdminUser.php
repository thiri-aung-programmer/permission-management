<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
class AdminUser extends Model
{
    //
    use SoftDeletes;

    public function role(){
        return  $this->belongsTo(Role::class,'role_id', 'id');
                    //   ->with("role:name");
    }
}
