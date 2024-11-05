<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Incidencia;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IncidenciaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_incidencia()
    {
        $data = [
            'titulo' => 'Error de Conexión',
            'descripcion' => 'Problema al conectar al servidor.',
            'estado' => 'To Do',
            'created_by' => 7, 
            'assigned_to' => 8, 
        ];

        $incidencia = Incidencia::create($data);

        $this->assertDatabaseHas('incidencias', $data);
    }
}
