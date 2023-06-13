<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangModel extends Model
{
    use HasFactory;
    protected $table ='keranjang';
    protected $primaryKey = 'id_keranjang';
    protected $guarded =[];
}
