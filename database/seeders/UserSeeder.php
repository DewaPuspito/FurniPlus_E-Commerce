<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        [   
            'name' => Str::random(255),
            'email' => Str::random(255).'@gmail.com',
            'password' => Hash::make('password'),
            'birth_date' => Str::random(255),
            'adress' => Str::random(255),
            'phone' => Str::random(255),
            'gender' => Str::random(255),
        ]
        ]);     
    }
    
}
