@extends('layouts.admin')

@section('title', 'Prestamos')

@section('content')
    <div class="container">
        <h1>Prestamos</h1>
        <a href="{{ route('prestamos.create') }}" class="btn btn-primary mb-3">Crear Prestamo</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Libro</th>
                    <th>Fecha de Entrega</th>
                    <th>Fecha de Devolución</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->id }}</td>
                        <td>{{ $prestamo->usuario?->name ?? 'Sin usuario' }}</td>
                        <td>{{ $prestamo->libro?->titulo ?? 'Sin libro' }}</td>
                        <td>{{ $prestamo->fecha_entrega ?? 'Sin fecha' }}</td>
                        <td>{{ $prestamo->fecha_devolucion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $prestamos->links() }}

    @endsection
