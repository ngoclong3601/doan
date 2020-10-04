<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('food')-> insert([
            'foodid'=>1,
            'foodname'=>'Mexican Eggrolls',
            'price'=>'$14.5',
            'img'=>'assets/images/food1.jpg',
            'quantity'=>10,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('food')-> insert([
            'foodid'=>2,
            'foodname'=>'Chicken Burger',
            'price'=>'$9.5',
            'img'=>'assets/images/food2.jpg',
            'quantity'=>10,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('food')-> insert([
            'foodid'=>3,
            'foodname'=>'Topu Lasange',
            'price'=>'$12.5',
            'img'=>'assets/images/food3.jpg',
            'quantity'=>10,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('food')-> insert([
            'foodid'=>4,
            'foodname'=>'Pepper Potatoas',
            'price'=>'$14.5',
            'img'=>'assets/images/food4.jpg',
            'quantity'=>10,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('food')-> insert([
            'foodid'=>5,
            'foodname'=>'Bean Salad',
            'price'=>'$8.5',
            'img'=>'assets/images/food5.jpg',
            'quantity'=>10,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('food')-> insert([
            'foodid'=>6,
            'foodname'=>'Beatball Hoagie',
            'price'=>'$11.5',
            'img'=>'assets/images/food6.jpg',
            'quantity'=>10,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
