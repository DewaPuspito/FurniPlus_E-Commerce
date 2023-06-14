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
                "id_barang" => "1",
                "id_user" => "3",
                "nama_pengguna" => "Jotaro",
                "alamat" => "Tokyo",
                "no_hp" => "089",
                "jumlah_pesanan" => "1",
                "total_harga" => "95.000",
                "status" => "Sudah Dibayar",
                "resi" => "426",

            ],
            [
                "id_barang" => "2",
                "id_user" => "4",
                "nama_pengguna" => "Josuke",
                "alamat" => "Osaka",
                "no_hp" => "084",
                "jumlah_pesanan" => "1",
                "total_harga" => "295.000",
                "status" => "Sudah Dibayar",
                "resi" => "642",
            ]
            ]);     
    }
}
