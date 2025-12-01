<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
class AdminUser extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name',
        'username',       
        'phone',
         'email',
         'address',         
        'pswd',
        'is_active',
        'gender',
        'role_id'
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'pswd',
        'remember_token',
    ];

    public function role(){
        return  $this->belongsTo(Role::class,'role_id', 'id');
                    //   ->with("role:name");
    }
}
