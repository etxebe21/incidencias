<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Soporte') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Bienvenido, {{ Auth::user()->name }}</h3>
                    <p>{{ __("En este panel puedes ver y gestionar las incidencias que te han sido asignadas.") }}</p>

                    <div class="mt-6">
                        <h4 class="font-semibold">Acciones rápidas:</h4>
                        <ul class="list-disc list-inside">
                            <li><a href="{{ route('incidencias.asignadas') }}" class="text-blue-500 hover:underline">Ver incidencias asignadas</a></li>
                            <li><a href="{{ route('incidencias.estado') }}" class="text-blue-500 hover:underline">Gestionar estado de incidencias</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
