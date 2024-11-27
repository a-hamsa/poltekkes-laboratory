<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'Admin@email.com',
            'password' => 'Admin1234#',
        ]);

        // $this->call(AbsensiSeeder::class);
        // $this->call(AlatSeeder::class);
        // $this->call(StockSeeder::class);
        // $this->call(StudentList::class);
    }
}
