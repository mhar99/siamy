<?php

namespace Database\Seeders;

use App\Models\hari;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class hariSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        hari::create([
            'nama_hari' => 'Senin'
        ]);
        hari::create([
            'nama_hari' => 'Selasa'
        ]);
        hari::create([
            'nama_hari' => 'Rabu'
        ]);
        hari::create([
            'nama_hari' => 'Kamis'
        ]);
        hari::create([
            'nama_hari' => 'Jumat'
        ]);
    }
}
