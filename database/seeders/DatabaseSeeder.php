<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    
    public function run(): void
    {
        $this->call([
            KeranjangSeeder::class,
            PesananSeeder::class,
            RefundSeeder::class,
            UserSeeder::class
        ]);
    }
}
