<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_access_incidencias_page()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->get('/incidencias')
            ->assertStatus(200);
    }

    /** @test */
    public function soporte_cannot_access_admin_page()
    {
        $soporte = User::factory()->create(['role' => 'soporte']);

        $this->actingAs($soporte)
            ->get('/incidencias') 
            ->assertStatus(403); 
    }
}
