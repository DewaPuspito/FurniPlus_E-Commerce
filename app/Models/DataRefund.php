<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRefund extends Model
{
    use HasFactory;
    protected $table = 'data_refund';

    protected $fillable = [
        'id_barang',
        'id_user',
        'nama_pengguna',
        'alamat',
        'no_hp',
        'jumlah_pesanan' ,
        'total_harga' ,
        'status' ,
        'resi' ,
        'alasan_refund',
    ];
}
