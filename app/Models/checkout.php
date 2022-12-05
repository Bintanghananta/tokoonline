<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    use HasFactory;
    protected $fillable = 
    ['nama_pembeli', 'nohp_pembeli', 'alamat_pembeli', 'nama_barang', 'total_barang', 'harga_barang'];
}
