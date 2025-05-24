<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gorden extends Model
{
    /** @use HasFactory<\Database\Factories\GordenFactory> */
    use HasFactory;
    protected $table="gordens";
    protected $guarded=["id"];
    protected $with=["jenis_gorden"];

    public function jenis_gorden() :BelongsTo
    {
        return $this->belongsTo( JenisGorden::class,'jenis_id');
    }
}
