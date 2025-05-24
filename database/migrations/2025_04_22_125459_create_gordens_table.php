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
        Schema::create('gordens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string ("nama_gorden");
            $table->text ("deskripsi");
            $table->text ("gambar")->nullable();
            $table->float ("harga");
            $table->integer ("stok")->default(0);
            $table->foreignId('jenis_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gordens');
    }
};
