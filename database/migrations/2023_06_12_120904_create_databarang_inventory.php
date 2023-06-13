<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('databarang_inventory');
        Schema::create('databarang_inventory', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('nama_barang');
            $table->string('foto_barang');
            $table->string('deskripsi_barang');
            $table->integer('stok_barang');
            $table->float('harga_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databarang_inventory');
    }
};
