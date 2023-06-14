<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [   
                "name" => "Dio",
                "email" => "dio@gmail.com",
                "password" => "mudamuda",
                "birth_date" => "1870",
                "address" => "New Hampshire",
                "phone" => "82174126872147",
                "gender" => "Male"
            ],
            [
                "name" => "Jolyne",
                "email" => "stonefree@gmail.com",
                "password" => "yareyaredawa",
                "birth_date" => "1996",
                "address" => "Dolphin Street",
                "phone" => "0216486214",
                "gender" => "Female"
            ]
        ]);     
    }
    
}
