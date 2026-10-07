<?php

namespace Database\Seeders;

use App\Models\Artista;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Concert;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artistesActius = Artista::where('actiu', true)->get();
        $artistas = Artista::all();
            Concert::insert([[
                'artista_id' => $artistesActius->firstWhere('nom', 'Tyler The Creator')->id,
                'nom' => 'IGOR Tour',
                'data_hora' => '2027-07-02 21:00:00',
                'durada_minuts' => 90,
                'tipus' => 'ACUSTIC',
            ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Bad Bunny')->id,
                    'nom' => 'Debí Tirar Más Fotos Tour',
                    'data_hora' => '2027-03-15 21:00:00',
                    'durada_minuts' => 120,
                    'tipus' => 'CONCERT',
                ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Bad Bunny')->id,
                    'nom' => 'Nadie Sabe Tour',
                    'data_hora' => '2027-04-22 20:30:00',
                    'durada_minuts' => 110,
                    'tipus' => 'CONCERT',
                ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Kanye West')->id,
                    'nom' => 'Yeezy Live',
                    'data_hora' => '2027-02-10 21:00:00',
                    'durada_minuts' => 100,
                    'tipus' => 'CONCERT',
                ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Kanye West')->id,
                    'nom' => 'Donda Experience',
                    'data_hora' => '2027-05-18 22:00:00',
                    'durada_minuts' => 120,
                    'tipus' => 'CONCERT',
                ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Metro Boomin')->id,
                    'nom' => 'Heroes & Villains Live',
                    'data_hora' => '2027-01-25 21:30:00',
                    'durada_minuts' => 90,
                    'tipus' => 'CONCERT',
                ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Metro Boomin')->id,
                    'nom' => 'Metro Boomin Live',
                    'data_hora' => '2027-06-05 20:00:00',
                    'durada_minuts' => 95,
                    'tipus' => 'CONCERT',
                ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Shoji Meguro')->id,
                    'nom' => 'Persona Music Concert',
                    'data_hora' => '2027-03-08 19:30:00',
                    'durada_minuts' => 100,
                    'tipus' => 'CONCERT',
                ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Shoji Meguro')->id,
                    'nom' => 'Meguro Soundscapes',
                    'data_hora' => '2027-08-14 20:00:00',
                    'durada_minuts' => 90,
                    'tipus' => 'ACUSTIC',
                ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Tyler The Creator')->id,
                    'nom' => 'Chromakopia Tour',
                    'data_hora' => '2027-07-02 21:00:00',
                    'durada_minuts' => 90,
                    'tipus' => 'ACUSTIC',
                ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Tyler The Creator')->id,
                    'nom' => 'Flower Boy Live',
                    'data_hora' => '2027-09-17 21:30:00',
                    'durada_minuts' => 100,
                    'tipus' => 'CONCERT',
                ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Vaundy')->id,
                    'nom' => 'Vaundy One Man Live',
                    'data_hora' => '2027-02-28 19:00:00',
                    'durada_minuts' => 105,
                    'tipus' => 'CONCERT',
                ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Vaundy')->id,
                    'nom' => 'Vaundy Arena Tour',
                    'data_hora' => '2027-05-30 20:30:00',
                    'durada_minuts' => 110,
                    'tipus' => 'CONCERT',
                ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Benjamin Netanyahu')->id,
                    'nom' => 'Benjamin Netanyahu Live',
                    'data_hora' => '2027-04-12 18:00:00',
                    'durada_minuts' => 90,
                    'tipus' => 'ACUSTIC',
                ],
                [
                    'artista_id' => $artistesActius->firstWhere('nom', 'Benjamin Netanyahu')->id,
                    'nom' => 'Netanyahu Special Event',
                    'data_hora' => '2027-10-01 19:00:00',
                    'durada_minuts' => 75,
                    'tipus' => 'ACUSTIC',
                ]]);}

}
