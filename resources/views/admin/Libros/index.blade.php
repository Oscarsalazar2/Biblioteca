@extends('layouts.admin')

@section('title', 'Libros')

@section('content')
    <div class="container mx-auto px-4 py-6">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2 flex items-center gap-3">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5 4.462 5 2 6.79 2 9v11c0-2.21 2.462-4 5.5-4 1.746 0 3.332.483 4.5 1.253m0-11C13.168 5.483 14.754 5 16.5 5 19.538 5 22 6.79 22 9v11c0-2.21-2.462-4-5.5-4-1.746 0-3.332.483-4.5 1.253" />
                        </svg>
                        Gestión de Libros
                    </h1>
                    <p class="text-gray-600 text-sm md:text-base">Administra y organiza los libros de tu biblioteca
                        digital</p>
                </div>
                <a href="{{ route('libros.create') }}"
                    class="inline-flex items-center gap-2 bg-linear-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nuevo Libro
                </a>
            </div>
        </div>

        <div class="mb-6">
            <div class="bg-linear-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100 shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="bg-blue-600 rounded-lg p-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5 4.462 5 2 6.79 2 9v11c0-2.21 2.462-4 5.5-4 1.746 0 3.332.483 4.5 1.253m0-11C13.168 5.483 14.754 5 16.5 5 19.538 5 22 6.79 22 9v11c0-2.21-2.462-4-5.5-4-1.746 0-3.332.483-4.5 1.253" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Total de Libros</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $libros->total() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <div class="bg-linear-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Listado de Libros
                </h3>
            </div>

            @if ($libros->count() > 0)
                <div>
                    <table class="w-full table-fixed">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th
                                    class="w-[24%] px-3 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Libro
                                </th>
                                <th
                                    class="w-[16%] px-3 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Autor
                                </th>
                                <th
                                    class="w-[14%] px-3 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ISBN
                                </th>
                                <th
                                    class="w-[16%] px-3 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Editorial
                                </th>
                                <th
                                    class="w-[14%] px-3 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Categoría
                                </th>
                                <th
                                    class="w-[16%] px-3 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($libros as $libro)
                                <tr class="hover:bg-blue-50 transition-colors duration-150">
                                    <td class="px-3 py-3 align-top">
                                        <div class="flex items-start gap-2 min-w-0">
                                            <div
                                                class="w-8 h-8 shrink-0 bg-linear-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-xs shadow-md">
                                                {{ strtoupper(substr($libro->titulo, 0, 2)) }}
                                            </div>
                                            <div class="min-w-0">
                                                <p class="text-sm font-semibold text-gray-800 wrap-break-word leading-snug">
                                                    {{ $libro->titulo }}</p>
                                                <p class="text-xs text-gray-500">Libro #{{ $libro->id }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3 text-sm text-gray-800 align-top">
                                        <div class="inline-flex items-start gap-1.5">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="wrap-break-word leading-snug">{{ $libro->autor }}</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3 text-sm text-gray-800 align-top">
                                        <div class="inline-flex items-start gap-1.5">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 7h6m-6 4h6m-6 4h6M7 5h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2z" />
                                            </svg>
                                            <span class="break-all leading-snug">{{ $libro->isbn }}</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3 text-sm text-gray-800 align-top">
                                        <div class="inline-flex items-start gap-1.5">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 7l9-4 9 4m-9 13V10m-7 10h14a2 2 0 002-2V7M5 21V9m14 12V9" />
                                            </svg>
                                            <span class="wrap-break-word leading-snug">{{ $libro->editorial }}</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3 text-sm text-gray-800 align-top">
                                        <div class="inline-flex items-start gap-1.5">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                            </svg>
                                            <span
                                                class="wrap-break-word leading-snug">{{ $libro->categoria?->nombre ?? 'Sin categoría' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3 text-sm text-gray-800 align-top">
                                        <div class="flex flex-col gap-2">
                                            <a href="{{ route('libros.edit', $libro->id) }}"
                                                class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 text-sm font-medium">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Editar
                                            </a>

                                            <a href="{{ route('libros.destroy', $libro->id) }}"
                                                class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 text-sm font-medium"
                                                onclick="event.preventDefault(); if(confirm('¿Estás seguro de eliminar este libro?')) { document.getElementById('delete-libro-form-{{ $libro->id }}').submit(); }">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Eliminar
                                            </a>

                                            <form id="delete-libro-form-{{ $libro->id }}"
                                                action="{{ route('libros.destroy', $libro->id) }}" method="POST"
                                                class="hidden">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($libros->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    {{ $libros->links() }}
                </div>
            @endif
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5 4.462 5 2 6.79 2 9v11c0-2.21 2.462-4 5.5-4 1.746 0 3.332.483 4.5 1.253m0-11C13.168 5.483 14.754 5 16.5 5 19.538 5 22 6.79 22 9v11c0-2.21-2.462-4-5.5-4-1.746 0-3.332.483-4.5 1.253" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-1">No hay libros registrados</h3>
                    <p class="text-gray-500 mb-4">Comienza agregando tu primer libro</p>
                    <a href="{{ route('libros.create') }}"
                        class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Agregar Primer Libro
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
