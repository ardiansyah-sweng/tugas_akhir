<?php

namespace Database\Seeders;
use App\Models\Mahasiswa;

use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            'nim' => '1700018117',
            'status' => '1',
            'avatar' => '',
            'user_id' => '3',
        ]);

        Mahasiswa::create([
            'nim' => '1700018174',
            'status' => '1',
            'avatar' => '',
            'user_id' => '35',
        ]);

        Mahasiswa::create([
            'nim' => '1700018117',
            'status' => '1',
            'avatar' => '',
            'user_id' => '36',
        ]);

        Mahasiswa::create([
            'nim' => '1700018203',
            'status' => '1',
            'avatar' => '',
            'user_id' => '37',
        ]);
    }
}
