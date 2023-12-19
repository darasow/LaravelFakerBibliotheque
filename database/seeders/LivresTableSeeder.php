<?php

namespace Database\Seeders;
use App\Models\Livre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Livre::truncate();
        Livre::factory(20)->create(['emprunter' => false]);

    }
}
