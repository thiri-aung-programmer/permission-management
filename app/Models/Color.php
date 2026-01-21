<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AdminUser;
use App\Models\Permission;

class Color extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',     
        
    ];
   
    public function flowerpots(){
        return $this->belongsToMany(FlowerPot::class,"flower_pots");
    }

}