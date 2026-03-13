@extends('layouts.admin')

@section('title', 'Seleccionar Libro para Prestamo')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-4xl">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2 flex items-center gap-3">
                <div class="bg-linear-to-br from-blue-500 to-blue-600 rounded-lg p-2.5 shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                Seleccionar Libro para Prestamo
            </h1>
            <p class="text-gray-600">Elige el libro que sera prestado al usuario seleccionado</p>
        </div>

        @isset($usuario)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 mb-6">
                <div class="bg-linear-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zm-8 8a4 4 0 00-4 4h16a4 4 0 00-4-4H8z" />
                        </svg>
                        Usuario del prestamo
                    </h3>
                </div>

                <div class="p-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <p class="text-xs text-gray-500 uppercase tracking-wide">ID</p>
                        <p class="text-base font-semibold text-gray-800">{{ $usuario->id }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Nombre</p>
                        <p class="text-base font-semibold text-gray-800">{{ $usuario->name }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <p class="text-xs text-gray-500 uppercase tracking-wide">Email</p>
                        <p class="text-base font-semibold text-gray-800 break-all">{{ $usuario->email }}</p>
                    </div>
                </div>
            </div>
        @endisset

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <div class="bg-linear-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5s3.332.483 4.5 1.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253" />
                    </svg>
                    Libro a prestar
                </h3>
            </div>

            <form action="{{ route('prestamos.store') }}" method="POST" class="p-6">
                @csrf

                <input type="hidden" name="usuario_id" value="{{ $usuario->id ?? '' }}">

                <div>
                    <label for="libro_id" class="block text-sm font-semibold text-gray-700 mb-2">
                        Selecciona un libro disponible
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5S4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18s3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5s3.332.483 4.5 1.253v13C19.832 18.483 18.246 18 16.5 18s-3.332.483-4.5 1.253" />
                            </svg>
                        </div>
                        <select name="libro_id" id="libro_id"
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-gray-800"
                            required>
                            <option value="">Selecciona un libro</option>
                            @foreach ($libros as $libro)
                                @php
                                    $noDisponible = (int) ($libro->estatus ?? 0) === 0;
                                @endphp
                                <option value="{{ $libro->id }}" @disabled($noDisponible)>
                                    {{ $libro->titulo }} - {{ $libro->autor }}
                                    @if ($noDisponible)
                                        (No disponible)
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <p class="mt-1.5 text-xs text-gray-500">Los libros no disponibles aparecen deshabilitados</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
                    <div>
                        <label for="fecha_entrega" class="block text-sm font-semibold text-gray-700 mb-2">
                            Fecha de prestamo
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="fecha_entrega" id="fecha_entrega"
                            value="{{ old('fecha_entrega', now()->format('Y-m-d')) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-gray-800"
                            required>
                    </div>

                    <div>
                        <label for="fecha_devolucion" class="block text-sm font-semibold text-gray-700 mb-2">
                            Fecha de devolucion
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="fecha_devolucion" id="fecha_devolucion"
                            value="{{ old('fecha_devolucion') }}" min="{{ now()->format('Y-m-d') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-gray-800"
                            required>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-gray-200">
                    <button type="submit"
                        class="flex-1 inline-flex items-center justify-center gap-2 bg-linear-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Registrar Prestamo
                    </button>
                    <a href="{{ route('prestamos.create') }}"
                        class="flex-1 inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Volver
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
