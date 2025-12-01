<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AdminUser;

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
}
