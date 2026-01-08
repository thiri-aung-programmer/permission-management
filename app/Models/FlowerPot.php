<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FlowerPot extends Model
{
    use SoftDeletes;
    protected $table = 'flower_pots';
    protected $fillable = [
        'name',        
        'images',	 	 	 	 	 	 	 	
        'code',
        'color',
        'size',
        'material',
        'price',
        'stock',
    ];
}
