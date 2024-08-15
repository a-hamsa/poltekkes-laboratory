<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AlatSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'name' => 'Product ' . $i,
                'amount' => rand(1, 20),
                'condition' => rand(0, 1) ? 'Berfungsi' : 'Rusak',
                'image' => 'images/default-image.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('inventory_clinics')->insert($data);
    }
}
