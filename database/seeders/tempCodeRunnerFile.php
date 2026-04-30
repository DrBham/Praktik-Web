<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'name' => 'Dimas Reginald',
                'student_id_number' => 'F55122001',
                'email' => 'dimas@example.com',
                'phone_number' => '08123456789',
                'birth_date' => '2004-01-01',
                'gender' => 'Male',
                'status' => 'Active',
                'major_id' => 1, // Pastikan ID ini ada di tabel majors
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}