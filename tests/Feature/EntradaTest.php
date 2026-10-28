<?php

namespace Tests\Feature;

use App\Models\Entrada;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EntradaTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_my_tickets_page(): void
    {
        $response = $this->get(route('entradas.meves'));

        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_access_my_tickets_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('entradas.meves'));

        $response->assertOk();
        $response->assertSee('Les meves entrades');
    }
}