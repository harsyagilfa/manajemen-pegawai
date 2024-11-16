<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Gilang Harsya Fadillah',
            'username' => 'harsyagilfa',
            'password' => Hash::make('123456'),
            'role_id' => 1,
        ]);
        Pegawai::create([
            'user_id' => $user->id,
            'no_hp' => '081366932277',
            'tanggal_lahir' => '1990-03-10',
        ]);
    }
}
