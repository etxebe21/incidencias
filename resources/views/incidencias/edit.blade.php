<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Incidencia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('incidencias.update', $incidencia) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="titulo" class="block font-medium text-gray-700">Título</label>
                            <input type="text" name="titulo" id="titulo" value="{{ $incidencia->titulo }}" required class="mt-1 block w-full">
                        </div>
                        <div>
                            <label for="descripcion" class="block font-medium text-gray-700">Descripción</label>
                            <textarea name="descripcion" id="descripcion" required class="mt-1 block w-full">{{ $incidencia->descripcion }}</textarea>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Actualizar Incidencia</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
