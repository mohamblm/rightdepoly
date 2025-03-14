<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Avis;
use Carbon\Carbon;

class AvisSeeder extends Seeder
{
    public function run(): void
    {
        Avis::insert([
            [
                'user_id' => 2,
                'formation_id' => 1,
                'note' => 5,
                'commentaire' => 'Super formation !',
                'created_at' => Carbon::create(2024, 1, 15),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'formation_id' => 2,
                'note' => 4,
                'commentaire' => 'Très bonne expérience.',
                'created_at' => Carbon::create(2024, 1, 18),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'formation_id' => 3,
                'note' => 3,
                'commentaire' => 'Assez bien, mais peut être amélioré.',
                'created_at' => Carbon::create(2024, 1, 20),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'formation_id' => 4,
                'note' => 2,
                'commentaire' => 'Formation trop courte.',
                'created_at' => Carbon::create(2024, 1, 22),
                'updated_at' => now(),
            ],
            [
                'user_id' => 6,
                'formation_id' => 5,
                'note' => 5,
                'commentaire' => 'Excellente formation, je recommande !',
                'created_at' => Carbon::create(2024, 1, 25),
                'updated_at' => now(),
            ],
        ]);
    }
}
