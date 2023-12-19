<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AuthorsTableSeeder;
use Database\Seeders\LivresTableSeeder;
use Database\Seeders\ClientsTableSeeder;
use Database\Seeders\EmpruntsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AuthorsTableSeeder::class);
        $this->call(LivresTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(EmpruntsTableSeeder::class);
    }
}
