<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'emolinam@ies-sabadell.cat'],
            [
                'name' => 'Eric Molina',
                'email_verified_at' => now(),
                'password' => Hash::make('P@ssw0rd'),
                'remember_token' => Str::random(10),
            ]
        );
        User::updateOrCreate(
            ['email' => 'apascualg@ies-sabadell.cat'],
            [
                'name' => 'Adrián Pascual',
                'email_verified_at' => now(),
                'password' => Hash::make('P@ssw0rd'),
                'remember_token' => Str::random(10),
            ]
        );
        User::updateOrCreate(
            ['email' => 'e.ykhabar@ies-sabadell.cat'],
            [
                'name' => 'Yassine Khabar',
                'email_verified_at' => now(),
                'password' => Hash::make('P@ssw0rd'),
                'remember_token' => Str::random(10),
            ]
        );
    }
}
