<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Permission;


class Feature extends Model
{
    //
      use SoftDeletes;
      
      protected $fillable = [
        'name',
        
        
    ];
    public function permissions(){
        return $this->hasMany(Permission::class,"feature_id");
    }
}
