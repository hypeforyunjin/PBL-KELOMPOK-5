<?php

namespace Database\Seeders;

use App\Models\JenisGorden;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisGordenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisgordens = ["gorden 1", "gorden 2", "gorden 3", "gorden 4"];

        foreach ($jenisgordens as $nama) {
            JenisGorden::create(['nama_jenis' => $nama]);
        }
    }

}
