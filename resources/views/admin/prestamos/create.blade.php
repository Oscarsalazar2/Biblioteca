@extends('layouts.admin')

@section('title', 'Crear Préstamo')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-3xl">
        <h1 class="text-2xl font-bold mb-4">Crear Préstamo</h1>
        <form action="{{ route('prestamos.buscar_usuario') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="usuario_id" class="block text-sm font-medium text-gray-700">ID del Usuario</label>
                <input type="text" name="usuario_id" id="usuario_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="usuario_nombre" class="block text-sm font-medium text-gray-700">Nombre del Usuario</label>
                <input type="text" name="usuario_nombre" id="usuario_nombre" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Buscar Usuario</button>
        </form>

        @isset($usuario)
            <div class="mt-6">
                <h2 class="text-xl font-semibold mb-2">Usuario Seleccionado</h2>
                <p><strong>ID:</strong> {{ $usuario->id }}</p>
                <p><strong>Nombre:</strong> {{ $usuario->name }}</p>
                <p><strong>Email:</strong> {{ $usuario->email }}</p>
            </div>
        @endisset
    </div>
@endsection
