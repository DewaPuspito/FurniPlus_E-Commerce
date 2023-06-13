<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KeranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('keranjang')->insert([
            [   
                "nama_barang" => "Kursi",
                "foto_barang" => "Kursi.jpg",
                "deskripsi_barang" => "Kursi Cantik",
                "jumlah_barang" => "1",
                "harga" => "95.000"
            ],
            [
                "nama_barang" => "Meja Belajar",
                "foto_barang" => "Meja_belajar.jpg",
                "deskripsi_barang" => "Ukuran: 100*50*88cm, Berat: 11.70KG, Bahan: MDF+Rangka besi, Ketebalan papan kayu: 1.2cm, Kuat dan nyaman digunakan",
                "jumlah_barang" => "1",
                "harga" => "295.000"
            ]
            ]);     
    }
}
