<?php

namespace Database\Seeders;

use App\Models\Incidencia;
use App\Models\User;
use Illuminate\Database\Seeder;

class IncidenciaSeeder extends Seeder {
    public function run() {
        $admin = User::where('role', 'admin')->first();
        $soporte = User::where('role', 'soporte')->first();

        // Lista de incidencias 
        $incidencias = [
            [
                'titulo' => 'Error de Conexión',
                'descripcion' => 'Problema al conectar al servidor de base de datos.',
                'estado' => 'To Do',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Caída del Servidor',
                'descripcion' => 'El servidor principal no responde a las solicitudes.',
                'estado' => 'Doing',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Fallo en la Carga de la Página',
                'descripcion' => 'Algunos usuarios reportan que la página no carga correctamente.',
                'estado' => 'To Do',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Problema de Seguridad',
                'descripcion' => 'Se detectó un intento de acceso no autorizado al sistema.',
                'estado' => 'To Do',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Actualización del Sistema',
                'descripcion' => 'Planificar la actualización del sistema para el próximo mes.',
                'estado' => 'Done',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Error 404 en Recursos Estáticos',
                'descripcion' => 'Algunos recursos no se encuentran, causando errores 404.',
                'estado' => 'Doing',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Problemas de Rendimiento',
                'descripcion' => 'La aplicación se está ejecutando más lento de lo normal.',
                'estado' => 'To Do',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Integración de API',
                'descripcion' => 'La API de pago no está respondiendo como se esperaba.',
                'estado' => 'To Do',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Actualización de Dependencias',
                'descripcion' => 'Actualizar todas las dependencias del proyecto a su última versión.',
                'estado' => 'Done',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Feedback de Usuario',
                'descripcion' => 'Recibir y analizar el feedback de los usuarios sobre la nueva funcionalidad.',
                'estado' => 'To Do',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Implementación de Nuevas Funcionalidades',
                'descripcion' => 'Desarrollar nuevas características para mejorar la usabilidad de la aplicación.',
                'estado' => 'To Do',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Configuración de Backup',
                'descripcion' => 'Establecer un sistema de backup automático para la base de datos.',
                'estado' => 'Done',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Falla en la Carga de Recursos CSS',
                'descripcion' => 'Recursos CSS no se cargan, lo que afecta el diseño del sitio.',
                'estado' => 'Doing',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Problemas de Compatibilidad con Navegadores',
                'descripcion' => 'Errores de visualización en Internet Explorer y Safari.',
                'estado' => 'To Do',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
            [
                'titulo' => 'Auditoría de Seguridad',
                'descripcion' => 'Realizar una auditoría de seguridad del sistema y corregir vulnerabilidades.',
                'estado' => 'To Do',
                'created_by' => $admin->id,
                'assigned_to' => $soporte->id,
            ],
        ];

        // Crear las incidencias en la base de datos
        foreach ($incidencias as $incidencia) {
            Incidencia::create($incidencia);
        }
    }
}
