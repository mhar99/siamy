<?php

namespace Database\Seeders;

use App\Models\kriteriaNilai as ModelsKriteriaNilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kriteriaNilai extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsKriteriaNilai::create([
            'guru_id' => '1',
            'kkm' => '70',
            'deskripsi_a' => 'sangat baik',
            'deskripsi_b' => 'baik',
            'deskripsi_c' => 'cukup',
            'deskripsi_d' => 'kurang',
        ]);
    }
}
