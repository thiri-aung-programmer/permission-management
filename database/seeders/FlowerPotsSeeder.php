<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FlowerPot;


class FlowerPotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $flowers=[
            [
            'name'=>'pot_1',        
            'images'=>'../public/images/pot1.png',	 	 	 	 	 	 	 	
            'code'=>'PA-00001',
            'color'=>'blue',
            'size'=>'sm',
            'material'=>'plastics',
            'price'=>'10000',
            'stock'=>'50',
            ],
            [
            'name'=>'pot_2',        
            'images'=>'../public/images/pot2.png',	 	 	 	 	 	 	 	
            'code'=>'PA-00002',
            'color'=>'green',
            'size'=>'md',
            'material'=>'plastics',
            'price'=>'11000',
            'stock'=>'50',
            ],
            [
            'name'=>'pot_3',        
            'images'=>'../public/images/pot3.png',	 	 	 	 	 	 	 	
            'code'=>'PA-00003',
            'color'=>'orange',
            'size'=>'sm',
            'material'=>'plastics',
            'price'=>'10000',
            'stock'=>'50',
            ],
            [
            'name'=>'pot_4',        
            'images'=>'../public/images/pot4.png',	 	 	 	 	 	 	 	
            'code'=>'PA-00004',
            'color'=>'brown',
            'size'=>'sm',
            'material'=>'clay',
            'price'=>'13000',
            'stock'=>'50',
            ],
            [
            'name'=>'pot_5',        
            'images'=>'../public/images/pot5.png',	 	 	 	 	 	 	 	
            'code'=>'PA-00005',
            'color'=>'blue',
            'size'=>'md',
            'material'=>'clay',
            'price'=>'15000',
            'stock'=>'50',
            ]
        ];
        foreach ($flowers as $flower) {
             FlowerPot::firstOrCreate([
            'name'=>$flower['name'],        
            'images'=>$flower['images'],	 	 	 	 	 	 	 	
            'code'=>$flower['code'],
            'color'=>$flower['color'],
            'size'=>$flower['size'],
            'material'=>$flower['material'],
            'price'=>$flower['price'],
            'stock'=>$flower['stock'],
        ]);
        };
       
    }
}
