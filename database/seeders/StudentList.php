<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StudentList extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [];
        $class = ['1A', '2B', '3C', '4D'];

        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'name' => 'Student ' . $i,
                'nim' => rand(2_000_000_000, 7_000_000_000),
                'class' => $class[rand(0, 3)],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('student_list_for_clinic')->insert($data);
    }
}
