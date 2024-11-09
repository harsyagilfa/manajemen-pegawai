<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'nama_role' => 'Admin',
                'deskripsi' => 'Admin Khusus jabatan HR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_role' => 'Pegawai',
                'deskripsi' => 'Seluruh pegawai yang jabatannya level staff atau dibawahnya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_role' => 'Supervisor',
                'deskripsi' => 'Pegawai yang menempati jabatan supervisor atau manajer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_role' => 'Super Admin',
                'deskripsi' => 'Khusus pegawai yang jabatannya yang berhubungan dengan IT',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
