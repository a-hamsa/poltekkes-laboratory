<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $class = ['1A', '2B', '3C', '4D'];

        for ($i = 1; $i <= 10; $i++) {
            // Generate a random timestamp within the last year
            $randomTimestamp = mt_rand(strtotime('-1 year'), time());
            
            // Create random `created_at` and `updated_at` dates
            $createdAt = Carbon::createFromTimestamp($randomTimestamp);
            // Randomize `updated_at` to be after `created_at` but before now
            $updatedAt = Carbon::createFromTimestamp(mt_rand($createdAt->timestamp, time()));

            $data[] = [
                'name' => 'Student ' . rand(1,3),
                'nim' => rand(2_000_000_000, 7_000_000_000),
                'class' => $class[rand(0, 3)],
                'semester' => '2024/2025',
                'absent_status' => rand(0,1),
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ];
        }   


        DB::table('absensi_for_clinic')->insert($data);
    }
}
