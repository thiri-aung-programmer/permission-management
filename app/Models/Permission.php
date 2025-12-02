<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Feature;

class Permission extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',        
        'feature_id'        
    ];

    public function feature(){
        return  $this->belongsTo(Role::class,'feature_id', 'id');
                    //   ->with("role:name");
    }
}
