<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\m_superAdmin;
use Illuminate\Support\Facades\Hash;

class defaultSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        m_superAdmin::create([
            'nama' => 'Super Admin',
            'username' => 'superadmin1',
            'password' => Hash::make('12345'),
            'level' => 'super',
        ]);
    }
}
