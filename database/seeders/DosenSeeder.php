<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosens')->insert([
            'nidn' => '10101010',
            'nama' => 'Dosen AA',
            'alamat' => 'Padang',
            'no_hp' => '081233445566',
        ]);
    }
}
