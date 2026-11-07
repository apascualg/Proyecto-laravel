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
        // Cogemos generos:

        $pop = Genere::where('nom', 'Pop')->first();
        $rock = Genere::where('nom', 'Rock')->first();
        $hiphop = Genere::where('nom', 'Hip-Hop')->first();
        $indie = Genere::where('nom', 'Indie')->first();
        $electro = Genere::where('nom', 'Electrònica')->first();
        $jazz = Genere::where('nom', 'Jazz')->first();

        // Cojemos cantantes
        $benjamin = Artista::where('nom', 'Benjamin Netanyahu')->first();
        $tyler = Artista::where('nom', 'Tyler The Creator')->first();
        $kingbon = Artista::where('nom', 'King Von')->first();
        $metroboomin = Artista::where('nom', 'Metro Boomin')->first();
        $kanye = Artista::where('nom', 'Kanye West')->first();
        $vaundy = Artista::where('nom', 'Vaundy')->first();
        $shoji = Artista::where('nom', 'Shoji Meguro')->first();
        $badbunny = Artista::where('nom', 'Bad Bunny')->first();
        $xxx = Artista::where('nom', 'XXXTentacion')->first();
        // assignamos sus generos a cada artista
        $benjamin->generes()->attach([$pop->id, $electro->id]);
        $tyler->generes()->attach([$rock->id, $indie->id]);
        $kingbon->generes()->attach([$indie->id, $hiphop->id]);
        $metroboomin->generes()->attach([$hiphop->id, $electro->id]);
        $kanye->generes()->attach([$hiphop->id, $pop->id]);
        $vaundy->generes()->attach([$rock->id, $indie->id]);
        $shoji->generes()->attach([$jazz->id, $electro->id]);
        $badbunny->generes()->attach([$hiphop->id, $pop->id]);
        $xxx->generes()->attach([$hiphop->id]);
    }
}
