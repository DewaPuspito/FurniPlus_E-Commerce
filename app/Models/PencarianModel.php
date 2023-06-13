<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencarianModel extends Model
{
    use HasFactory;
    protected $table ='databarang_inventory';
    protected $primaryKey = 'id_barang';
    protected $guarded =[];
}
