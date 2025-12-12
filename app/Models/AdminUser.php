<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
class AdminUser extends Authenticatable
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name',
        'username',
        'phone',
        'email',
        'address',
        'password',
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
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
        //   ->with("role:name");
    }
    protected function casts(): array
    {
        return [
            // 'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // public function isAdmin()
    // {
    //     return strtolower($this->role->name) == 'admin';
    // }

}
