<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Emprunt;
use App\Models\Livre;

class EmpruntsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $livres = Livre::where('emprunter', false)->limit(10)->get();

        foreach ($livres as $livre) {
            Emprunt::factory()->create(['livre_id' => $livre->id]);
            $livre->update(['emprunter' => true]);
        }
    }
}
