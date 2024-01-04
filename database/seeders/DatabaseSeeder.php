<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(defaultSuperAdmin::class);
        $this->call(kriteriaNilai::class);
        $this->call(hariSeed::class);
        // \App\Models\User::factory(10)->create();
    }
}
