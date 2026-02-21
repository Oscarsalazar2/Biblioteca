@extends('layouts.admin')

@section('title', 'Editar Libro')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-3xl">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Editar Libro</h1>
        </div>

        <div class="bg-white rounded-xl shadow border border-gray-100 p-6">
            <form action="{{ route('libros.update', $libro->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label for="titulo" class="block text-sm font-semibold text-gray-700 mb-2">Título</label>
                    <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $libro->titulo) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <div>
                    <label for="autor" class="block text-sm font-semibold text-gray-700 mb-2">Autor</label>
                    <input type="text" id="autor" name="autor" value="{{ old('autor', $libro->autor) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <div>
                    <label for="isbn" class="block text-sm font-semibold text-gray-700 mb-2">ISBN</label>
                    <input type="text" id="isbn" name="isbn" value="{{ old('isbn', $libro->isbn) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <div>
                    <label for="editorial" class="block text-sm font-semibold text-gray-700 mb-2">Editorial</label>
                    <input type="text" id="editorial" name="editorial" value="{{ old('editorial', $libro->editorial) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <div>
                    <label for="id_categoria" class="block text-sm font-semibold text-gray-700 mb-2">Categoría</label>
                    <select id="id_categoria" name="id_categoria"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ (string) old('id_categoria', $libro->id_categoria) === (string) $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit"
                        class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg">
                        Guardar cambios
                    </button>
                    <a href="{{ route('libros.index') }}"
                        class="inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-5 py-2 rounded-lg">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
