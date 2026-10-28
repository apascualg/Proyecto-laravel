<?php

namespace Database\Seeders;

use App\Models\Concert;
use App\Models\Entrada;
use App\Models\User;
use Illuminate\Database\Seeder;

class EntradaSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $concerts = Concert::with('escenari')->get();

        if ($users->isEmpty() || $concerts->isEmpty()) {
            $this->command->error(
                'Cal tenir usuaris i concerts abans de crear entrades.'
            );

            return;
        }

        $entradesActuals = Entrada::count();
        $entradesPerCrear = max(0, 30 - $entradesActuals);

        for ($i = 0; $i < $entradesPerCrear; $i++) {
            $concertsDisponibles = $concerts->filter(function ($concert) {
                if (!$concert->escenari) {
                    return false;
                }

                $venudes = Entrada::where('concert_id', $concert->id)->count();

                return $venudes < $concert->escenari->aforament_maxim;
            });

            if ($concertsDisponibles->isEmpty()) {
                $this->command->warn(
                    'No hi ha prou aforament disponible per crear més entrades.'
                );

                break;
            }

            $concert = $concertsDisponibles->random();
            $user = $users->random();

            Entrada::create([
                'user_id' => $user->id,
                'concert_id' => $concert->id,
                'preu_pagat' => 50.00,
            ]);
        }

        $this->command->info(
            'Total d’entrades: ' . Entrada::count()
        );
    }
}
