<?php

namespace Database\Seeders;

use App\Models\Genere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenereSeeder extends Seeder
{

    public function run(): void
    {
        Genere::insert([[
            'nom' => 'Rock',
            ],[
            'nom' => 'Electrònica',
        ],
            [
            'nom' => 'Pop',
        ],
            [
                'nom' => 'Jazz',
            ],
            [
                'nom' => 'Hip-Hop',
            ],
            [
                'nom' => 'Indie',
            ]
            ]);
    }
}
