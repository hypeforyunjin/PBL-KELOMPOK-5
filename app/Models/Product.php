<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'harga', 'stock', 'gambar', 'jenis'];
}
