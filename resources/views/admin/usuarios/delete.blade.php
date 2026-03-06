@extends('layouts.admin')

@section('title', 'Eliminar Usuario')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-3xl">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2 flex items-center gap-3">
                <div class="bg-linear-to-br from-red-500 to-red-600 rounded-lg p-2.5 shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-8.938 4h17.876c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L1.33 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                Confirmar Eliminacion
            </h1>
            <p class="text-gray-600">Esta accion eliminara el usuario de forma permanente del sistema.</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-red-100">
            <div class="bg-linear-to-r from-red-50 to-orange-50 px-6 py-4 border-b border-red-100">
                <h3 class="text-lg font-semibold text-red-800 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Verifica la informacion antes de continuar
                </h3>
            </div>

            <div class="p-6">
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
                    <p class="text-red-800 font-medium">
                        Estas a punto de eliminar este usuario. Esta accion no se puede deshacer.
                    </p>
                </div>

                <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 bg-linear-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-sm shadow-md shrink-0">
                            {{ strtoupper(substr($usuario->name, 0, 2)) }}
                        </div>
                        <div class="w-full space-y-3">
                            <div>
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Nombre</p>
                                <p class="text-base font-semibold text-gray-900">{{ $usuario->name }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Correo electronico
                                </p>
                                <p class="text-sm text-gray-800 break-all">{{ $usuario->email }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Tipo de usuario</p>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $usuario->user_type === 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-emerald-100 text-emerald-700' }}">
                                    {{ ucfirst($usuario->user_type) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                    class="mt-8 flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="flex-1 inline-flex items-center justify-center gap-2 bg-linear-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Eliminar Usuario
                    </button>

                    <a href="{{ route('usuarios.index') }}"
                        class="flex-1 inline-flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 19l-7-7m0 0l7-7m-7 7h16" />
                        </svg>
                        Volver al listado
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
