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
                <a href="#ver-todos" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
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
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">María González</td>
                            <td class="px-4 py-3">Cien años de soledad</td>
                            <td class="px-4 py-3">15/05/2023</td>
                            <td class="px-4 py-3">30/05/2023</td>
                            <td class="px-4 py-3 "><span
                                    class="px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Ficción</span>
                            </td>
                            <td class="px-4 py-3">
                                <span
                                    class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Activo</span>
                            </td>
                        </tr>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">Carlos López</td>
                            <td class="px-4 py-3">El Principito</td>
                            <td class="px-4 py-3">10/05/2023</td>
                            <td class="px-4 py-3">25/05/2023</td>
                            <td class="px-4 py-3"><span
                                    class="px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Ficción</span>
                            </td>
                            <td class="px-4 py-3"> <span
                                    class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Por
                                    vencer</span></td>
                            </td>
                        </tr>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">Ana Martínez</td>
                            <td class="px-4 py-3">1984</td>
                            <td class="px-4 py-3">01/05/2023</td>
                            <td class="px-4 py-3">15/05/2023</td>
                            <td class="px-4 py-3"><span
                                    class="px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Ficción</span>
                            </td>
                            <td class="px-4 py-3">
                                <span
                                    class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Retrasado</span>
                            </td>
                        </tr>
                        <tr class="bg-white hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium">José Rodríguez</td>
                            <td class="px-4 py-3">Don Quijote de la Mancha</td>
                            <td class="px-4 py-3">18/05/2023</td>
                            <td class="px-4 py-3">02/06/2023</td>
                            <td class="px-4 py-3"><span
                                    class="px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Ficción</span>
                            </td>
                            <td class="px-4 py-3">
                                <span
                                    class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">Activo</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Información adicional -->
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <article class="bg-white rounded-xl card-shadow p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Libros Populares</h2>
                <ul class="space-y-4">
                    <li class="flex justify-between items-center p-3 hover:bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-book text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-medium">Cien años de soledad</h3>
                                <p class="text-sm text-gray-500">Gabriel García Márquez</p>
                            </div>
                        </div>
                        <span class="font-bold text-blue-700">42 préstamos</span>
                    </li>
                    <li class="flex justify-between items-center p-3 hover:bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-book text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-medium">El amor en los tiempos del cólera</h3>
                                <p class="text-sm text-gray-500">Gabriel García Márquez</p>
                            </div>
                        </div>
                        <span class="font-bold text-blue-700">38 préstamos</span>
                    </li>
                    <li class="flex justify-between items-center p-3 hover:bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-book text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-medium">1984</h3>
                                <p class="text-sm text-gray-500">George Orwell</p>
                            </div>
                        </div>
                        <span class="font-bold text-blue-700">35 préstamos</span>
                    </li>
                    <li class="flex justify-between items-center p-3 hover:bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-book text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-medium">El Principito</h3>
                                <p class="text-sm text-gray-500">Antoine de Saint-Exupéry</p>
                            </div>
                        </div>
                        <span class="font-bold text-blue-700">32 préstamos</span>
                    </li>
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
                    <a href="{{route('prestamos.create') }}"
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
