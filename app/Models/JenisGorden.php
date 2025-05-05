<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisGorden extends Model
{
    /** @use HasFactory<\Database\Factories\JenisGordenFactory> */
    use HasFactory;
    protected $table="jenis_gordens";
    protected $guarded=["id"];

}
