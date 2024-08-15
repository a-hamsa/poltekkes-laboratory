<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'name' => 'Product ' . $i,
                'amount' => rand(1, 20),
                'description' => 'Lorem ipsum dolor sit amet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('stok_clinics')->insert($data);
    }
}
