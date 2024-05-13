<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            StateSeeder::class,
            UserSeeder::class,
            // SurveySeeder::class
        ]);
        User::create([
            'name' => 'Bowofade Oyerinde',
            'email' => 'contact@bowofade.com',
            'phone' => '07082456789',
            'password' => bcrypt('password'),
            'ward' => 'Oriade',
            'lga_id' => random_int(1, 50),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Jootar Kelvin',
            'email' => 'Kelswashima@gmail.com',
            'phone' => '+2348060751921',
            'password' => bcrypt('admin'),
            'ward' => 'tekun',
            'lga_id' => random_int(1, 50),
            'role' => 'admin'
        ]);
    }
}
