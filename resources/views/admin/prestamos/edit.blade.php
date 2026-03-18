@extends('layouts.admin')

@section('title', 'Editar Prestamo')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-3xl">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2 flex items-center gap-3">
                <div class="bg-linear-to-br from-blue-500 to-blue-600 rounded-lg p-2.5 shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                Editar Prestamo
            </h1>
            <p class="text-gray-600">Modifica los detalles del prestamo seleccionado</p>
        </div>

        <!-- Aquí iría el formulario de edición del prestamo -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Detalles del Prestamo</h3>
            <!-- Formulario de edición (similar al de creación pero con valores prellenados) -->
            <!-- ... -->
        </div>
    </div>
@endsection
