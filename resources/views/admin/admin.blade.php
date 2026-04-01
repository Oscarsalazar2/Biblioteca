@extends('layouts.admin')

@section('title', 'Panel de Administración')

@section('content')
    <style>
        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            transition: transform 0.2s;
        }
    </style>

    <div class="container mx-auto px-4 md:px-8">
        <!-- Título de la página actual -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Panel de Administración</h2>
            <p class="text-gray-600">Gestiona los recursos de la biblioteca desde esta interfaz</p>
        </div>

        <!-- Tarjetas de estadísticas -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <article class="bg-white p-5 rounded-xl card-shadow hover-lift">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium">Total de Libros</h3>
                        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalLibros }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-book text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-3 pt-3 border-t border-gray-100">
                    <span class="text-green-600 text-sm font-medium">
                        <i class="fas fa-arrow-up mr-1"></i> 12% este mes
                    </span>
                </div>
            </article>

            <article class="bg-white p-5 rounded-xl card-shadow hover-lift">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium">Usuarios Activos</h3>
                        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalUsuarios }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                        <i class="fas fa-users text-green-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-3 pt-3 border-t border-gray-100">
                    <span class="text-green-600 text-sm font-medium">
                        <i class="fas fa-arrow-up mr-1"></i> 5% este mes
                    </span>
                </div>
            </article>

            <article class="bg-white p-5 rounded-xl card-shadow hover-lift">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium">Préstamos Activos</h3>
                        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalPrestamos }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                        <i class="fas fa-exchange-alt text-yellow-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-3 pt-3 border-t border-gray-100">
                    <span class="text-red-600 text-sm font-medium">
                        <i class="fas fa-arrow-down mr-1"></i> 3% esta semana
                    </span>
                </div>
            </article>

            <article class="bg-white p-5 rounded-xl card-shadow hover-lift">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium">Libros Retrasados</h3>
                        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalPrestamosRetrasados }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-3 pt-3 border-t border-gray-100">
                    <span class="text-red-600 text-sm font-medium">
                        <i class="fas fa-arrow-up mr-1"></i> 8% esta semana
                    </span>
                </div>
            </article>
        </section>

        <!-- Sección de actividades recientes -->
        <section class="bg-white rounded-xl card-shadow p-6 mb-8">
            <header class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800">Préstamos Recientes</h2>
                <a href="{{ route('prestamos.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    Ver todos <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </header>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3">Usuario</th>
                            <th scope="col" class="px-4 py-3">Libro</th>
                            <th scope="col" class="px-4 py-3">Fecha Préstamo</th>
                            <th scope="col" class="px-4 py-3">Fecha Devolución</th>
                            <th scope="col" class="px-4 py-3">Categoria</th>
                            <th scope="col" class="px-4 py-3">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prestamosRecientes as $prestamo)
                            @php
                                $fechaDevolucion = $prestamo->fecha_devolucion
                                    ? \Carbon\Carbon::parse($prestamo->fecha_devolucion)
                                    : null;

                                $estado = 'Sin fecha';
                                $estadoColor = 'bg-gray-100 text-gray-800';

                                if ($fechaDevolucion) {
                                    if ($prestamo->estado === 'devuelto') {
                                        $estado = 'Entregado';
                                        $estadoColor = 'bg-green-100 text-green-800';
                                    } elseif ($fechaDevolucion->isPast()) {
                                        $estado = 'Retrasado';
                                        $estadoColor = 'bg-red-100 text-red-800';
                                    } elseif (now()->diffInDays($fechaDevolucion, false) <= 2) {
                                        $estado = 'Por vencer';
                                        $estadoColor = 'bg-yellow-100 text-yellow-800';
                                    } else {
                                        $estado = 'Activo';
                                        $estadoColor = 'bg-green-100 text-green-800';
                                    }
                                }
                            @endphp

                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium">{{ $prestamo->usuario?->name ?? 'Sin usuario' }}</td>
                                <td class="px-4 py-3">{{ $prestamo->libro?->titulo ?? 'Sin libro' }}</td>
                                <td class="px-4 py-3">
                                    {{ $prestamo->fecha_entrega ? \Carbon\Carbon::parse($prestamo->fecha_entrega)->format('d/m/Y') : 'Sin fecha' }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $prestamo->fecha_devolucion ? \Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y') : 'Sin fecha' }}
                                </td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $prestamo->libro?->categoria?->nombre ?? 'Sin categoría' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded-full text-xs font-medium {{ $estadoColor }}">
                                        {{ $estado }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-gray-500">No hay préstamos recientes.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Información adicional -->
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <article class="bg-white rounded-xl card-shadow p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Libros Populares</h2>
                <ul class="space-y-4">
                    @forelse ($librosPopulares as $popular)
                        <li class="flex justify-between items-center p-3 hover:bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-book text-blue-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-medium">{{ $popular->libro?->titulo ?? 'Libro no disponible' }}</h3>
                                    <p class="text-sm text-gray-500">{{ $popular->libro?->autor ?? 'Sin autor' }}</p>
                                </div>
                            </div>
                            <span class="font-bold text-blue-700">{{ $popular->total_prestamos }} préstamos</span>
                        </li>
                    @empty
                        <li class="p-3 text-sm text-gray-500 bg-gray-50 rounded-lg">
                            Aún no hay datos de préstamos para mostrar libros populares.
                        </li>
                    @endforelse
                </ul>
            </article>

            <article class="bg-white rounded-xl card-shadow p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Acciones Rápidas</h2>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('libros.create') }}"
                        class="flex flex-col items-center justify-center p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200 hover-lift">
                        <i class="fas fa-plus-circle text-blue-600 text-2xl mb-2"></i>
                        <span class="font-medium text-blue-800">Agregar Libro</span>
                    </a>
                    <a href="{{ route('usuarios.create') }}"
                        class="flex flex-col items-center justify-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition-colors duration-200 hover-lift">
                        <i class="fas fa-user-plus text-green-600 text-2xl mb-2"></i>
                        <span class="font-medium text-green-800">Registrar Usuario</span>
                    </a>
                    <a href="{{ route('prestamos.create') }}"
                        class="flex flex-col items-center justify-center p-4 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition-colors duration-200 hover-lift">
                        <i class="fas fa-exchange-alt text-yellow-600 text-2xl mb-2"></i>
                        <span class="font-medium text-yellow-800">Nuevo Préstamo</span>
                    </a>
                    <a href="{{ route('categorias.index') }}"
                        class="flex flex-col items-center justify-center p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors duration-200 hover-lift">
                        <i class="fas fa-tags text-purple-600 text-2xl mb-2"></i>
                        <span class="font-medium text-purple-800">Categorías</span>
                    </a>
                </div>
            </article>
        </section>
    </div>
@endsection
