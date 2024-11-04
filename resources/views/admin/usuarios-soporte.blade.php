<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('USUARIOS DE SOPORTE') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 mt-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4">
            @foreach ($users as $user)
                <div class="bg-white rounded-lg shadow-md transition-transform transform hover:scale-105 hover:shadow-lg p-6 max-w-lg mx-auto">
                    <h5 class="font-medium text-2xl mb-4">{{ $user->name }}</h5>
                    <p class="text-gray-600">Detalles del usuario: {{ $user->email }}</p>
                    <a href="{{ route('usuarios.incidencias', $user->id) }}" class="flex items-center justify-center w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-300 mt-6">
                        Ver incidencias
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

