<?php

namespace Database\Seeders;

use App\Models\Concert;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //los seeders se llaman siempre asi. Te lo vas copiando entre proyectos.
        $this->call([
            GenereSeeder::class,
            ArtistaSeeder::class,
            EscenariSeeder::class,
            ConcertSeeder::class,
            UserSeeder::class,

        ]);
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
