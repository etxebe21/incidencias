<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Incidencia;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IncidenciaControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_create_incidencia()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->post('/incidencias', [
                'titulo' => 'Error de Conexión',
                'descripcion' => 'Problema al conectar al servidor.',
                'estado' => 'To Do',
                'assigned_to' => 8, 
            ])
            ->assertRedirect('/incidencias');

        $this->assertDatabaseHas('incidencias', [
            'titulo' => 'Error de Conexión',
        ]);
    }

    /** @test */
    public function soporte_can_see_assigned_incidencias()
    {
        $soporte = User::factory()->create(['role' => 'soporte']);
        Incidencia::factory()->create(['assigned_to' => $soporte->id]);

        $this->actingAs($soporte)
            ->get('/incidencias')
            ->assertSee('Error de Conexión'); 
    }
}
