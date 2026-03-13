@extends('layouts.admin')

@section('title', 'Crear Prestamo')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-3xl">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2 flex items-center gap-3">
                <div class="bg-linear-to-br from-blue-500 to-blue-600 rounded-lg p-2.5 shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                Crear Nuevo Prestamo
            </h1>
            <p class="text-gray-600">Busca y selecciona un usuario para registrar un nuevo prestamo</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 mb-6">
            <div class="bg-linear-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zm-8 8a4 4 0 00-4 4h16a4 4 0 00-4-4H8z" />
                    </svg>
                    Buscar usuario
                </h3>
            </div>

            <form action="{{ route('prestamos.buscar_usuario') }}" method="POST" class="p-6">
                @csrf

                <div class="space-y-6">
                    <div>
                        <label for="usuario_id" class="block text-sm font-semibold text-gray-700 mb-2">ID del
                            usuario</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <input type="text" name="usuario_id" id="usuario_id" value="{{ old('usuario_id') }}"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-gray-800 placeholder-gray-400"
                                placeholder="Ej: 1">
                        </div>
                    </div>

                    <div>
                        <label for="usuario_nombre" class="block text-sm font-semibold text-gray-700 mb-2">Nombre del
                            usuario</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <input type="text" name="usuario_nombre" id="usuario_nombre"
                                value="{{ old('usuario_nombre') }}"
                                class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-gray-800 placeholder-gray-400"
                                placeholder="Ej: Juan Perez">
                        </div>
                        <p class="mt-1.5 text-xs text-gray-500">Puedes buscar por ID o por nombre</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-gray-200">
                        <button type="submit"
                            class="flex-1 inline-flex items-center justify-center gap-2 bg-linear-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Buscar Usuario
                        </button>
                        <a href="{{ route('prestamos.index') }}"
                            class="flex-1 inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>

        @isset($usuario)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="bg-linear-to-r from-green-50 to-green-100 px-6 py-4 border-b border-green-200">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Usuario seleccionado
                    </h3>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
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

                    <form action="{{ route('prestamos.select_libro') }}" method="POST">
                        @csrf
                        <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">

                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 bg-linear-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                            Seleccionar Usuario y Continuar
                        </button>
                    </form>
                </div>
            </div>
        @endisset
    </div>
@endsection
