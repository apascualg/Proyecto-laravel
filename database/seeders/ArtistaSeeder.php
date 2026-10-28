<?php

namespace Database\Seeders;

use App\Models\Genere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artista;

class ArtistaSeeder extends Seeder
{

    public function run(): void
    {
//        $rosalia = Artista::where('nom', 'Rosalía')->first();
//        $pop = Genere::where('nom', 'Pop')->first();
//        $electro = Genere::where('nom', 'Electrònica')->first();
//        $rosalia->generes()->attach([$pop->id, $electro->id]);

        Artista::insert([[
            'nom' => 'Tyler The Creator',
            'pais' => 'E.E.U.U',
            'bio' => 'Cantante americano.',
            'imatge_url' => null,
            'actiu' => true,],
                [
            'nom' => 'Kanye West',
            'pais' => 'E.E.U.U',
            'bio' => 'Cantante americano.',
            'imatge_url' => null,
            'actiu' => true,
        ],
        [
            'nom' => 'Vaundy',
            'pais' => 'Japó',
            'bio' => 'Cantante japonés.',
            'imatge_url' => null,
            'actiu' => true,
        ],
                [
                    'nom' => 'Shoji Meguro',
                    'pais' => 'Japó',
                    'bio' => 'Compositor japonés.',
                    'imatge_url' => null,
                    'actiu' => true,
                ],[
                    'nom' => 'Bad Bunny',
                    'pais' => 'Puerto Rico',
                    'bio' => 'Cantante puertorriqueño.',
                    'imatge_url' => null,
                    'actiu' => true,

                ],
                [
                    'nom' => 'Metro Boomin',
                    'pais' => 'E.E.U.U',
                    'bio' => 'Compositor americano.',
                    'imatge_url' => null,
                    'actiu' => true,
                ],
                [
                    'nom' => 'XXXTentacion',
                    'pais' => 'E.E.U.U',
                    'bio' => 'Cantante americano.',
                    'imatge_url' => null,
                    'actiu' => false,
                ],
                [
                    'nom' => 'King Von',
                    'pais' => 'E.E.U.U',
                    'bio' => 'Cantante americano.',
                    'imatge_url' => null,
                    'actiu' => false,
                ],
                [
                    'nom' => 'Benjamin Netanyahu',
                    'pais' => 'Israel',
                    'bio' => 'Cantante israelita.',
                    'imatge_url' => null,
                    'actiu' => true,],
                ]

        );

    }
}
