@extends('layouts.admin')

@section('title', 'Prestamos')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-6xl">
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Prestamos</h1>
                <p class="text-gray-600">Gestiona el historial y estado de los prestamos registrados</p>
            </div>
            <a href="{{ route('prestamos.create') }}"
                class="inline-flex items-center justify-center gap-2 bg-linear-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold px-5 py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Crear Prestamo
            </a>
        </div>

        <section class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-gray-100">
            <header class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800">Prestamos Recientes</h2>
                <span class="text-sm text-gray-500">Total: {{ $prestamos->total() }}</span>
            </header>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3">Usuario</th>
                            <th scope="col" class="px-4 py-3">Libro</th>
                            <th scope="col" class="px-4 py-3">Fecha Prestamo</th>
                            <th scope="col" class="px-4 py-3">Fecha Devolucion</th>
                            <th scope="col" class="px-4 py-3">Categoria</th>
                            <th scope="col" class="px-4 py-3">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prestamos as $prestamo)
                            @php
                                $fechaDevolucion = $prestamo->fecha_devolucion
                                    ? \Carbon\Carbon::parse($prestamo->fecha_devolucion)
                                    : null;
                                $estado = 'Sin fecha';
                                $estadoColor = 'bg-gray-100 text-gray-800';

                                if ($fechaDevolucion) {
                                    if ($fechaDevolucion->isPast()) {
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
                                        {{ $prestamo->libro?->categoria?->nombre ?? 'Sin categoria' }}
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
                                <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                    No hay prestamos registrados por ahora.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $prestamos->links() }}
            </div>
        </section>
    </div>
@endsection
