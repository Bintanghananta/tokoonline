<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fillable = 
    ['nama_barang', 'jenis_barang', 'descripsi_barang', 'stok_barang', 'harga_barang'];
}
