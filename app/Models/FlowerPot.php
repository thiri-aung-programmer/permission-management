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
     public function color()
    {
        return $this->belongsTo(Color::class, 'color', 'id');
        //   ->with("role:name");
    }
    public function material()
    {
        return $this->belongsTo(Material::class, 'material', 'id');
        //   ->with("role:name");
    }
    public function size()
    {
        return $this->belongsTo(Size::class, 'size', 'id');
        //   ->with("role:name");
    }
    
    

}
