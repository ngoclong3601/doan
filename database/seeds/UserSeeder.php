<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
            'name'=>'Ngọc Long',
            'email'=> 'ngoclong@gmail.com',
            'phone'=> '12345',
            
            'password'=> bcrypt('12345'),
        
            
            'created_at'=>now(),
            'updated_at'=>now(),

        ]);
        DB::table('users')->insert([
            
            'name'=>'Ngọc Khánh',
            'email'=> 'ngockhanh@gmail.com',
            'phone'=> '6789',
            
            'password'=>bcrypt('123'),
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
