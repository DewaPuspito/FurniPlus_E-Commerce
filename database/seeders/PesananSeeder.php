<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_pesanan')->insert([
            [   
                "nama_pengguna" => "Jotaro",
                "alamat" => "Tokyo",
                "no_hp" => "089489718942",
                "jumlah_pesanan" => "1",
                "total_harga" => "95.000",
                "status" => "Sudah Dibayar",
                "resi" => "4268468426",

            ],
            [
                "nama_pengguna" => "Josuke",
                "alamat" => "Osaka",
                "no_hp" => "08492478126468",
                "jumlah_pesanan" => "1",
                "total_harga" => "295.000",
                "status" => "Sudah Dibayar",
                "resi" => "642824144",
            ]
            ]);     
    }
}
