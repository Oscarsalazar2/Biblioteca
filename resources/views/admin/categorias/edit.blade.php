@extends('layouts.admin')

@section('title', 'Editar categoria')

@section('content')
    <style>
        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>

    <div class="container mx-auto px-4 md:px-8">
        <!-- Título de la página -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Editar Categoria</h2>
            <p class="text-gray-600">Modifica la información de la categoría</p>
        </div>

        <!-- Formulario -->
        <section class="bg-white rounded-xl card-shadow p-8 max-w-3xl">
            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Fila 1: Nombre de la Categoría -->
                <div class="mb-6">
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">
                        Nombre de la Categoría <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        value="{{ old('nombre', $categoria->nombre) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('nombre') border-red-500 @enderror"
                        placeholder="Ingresa el nombre de la categoría"
                        required
                    >
                    @error('nombre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botones de acción -->
                <div class="flex gap-4 mt-8 pt-6 border-t border-gray-200">
                    <button
                        type="submit"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200 flex items-center justify-center gap-2"
                    >
                        <i class="fas fa-save"></i> Guardar Cambios
                    </button>
                    <a
                        href="{{ route('categorias.index') }}"
                        class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-200 flex items-center justify-center gap-2"
                    >
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </section>
    </div>
@endsection
