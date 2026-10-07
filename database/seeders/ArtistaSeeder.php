<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artista;

class ArtistaSeeder extends Seeder
{

    public function run(): void
    {
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
                    'imatge_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSB0Y6CdRQlID90paIUApJpDIDoHTI0ifrzdZGka7fC_xuvLplWSkzEjYbkfC267C6d3ouvnthQpt_THGW__zY8MF8i9DJzJhVmsW_gVIfj&s=10',
                    'actiu' => true,],
                ]

        );

    }
}
