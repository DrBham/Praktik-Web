<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majors')->insert([
            [
                'name' => 'S1 Teknik Informatika',
                'code' => '0001',
                'description' => 'Prodi yang mempelajari ilmu tentang Teknik Informatika',
            ],
            [
                'name' => 'S1 Sistem Informasi',
                'code' => '0002',
                'description' => 'Prodi yang mempelajari ilmu tentang Sistem Informasi',
            ]
        ]);
    }
}