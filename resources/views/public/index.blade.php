@extends('layouts.user')

@section('title', 'Inicio')

@section('content')
    <h1>Bienvenido,{{ Auth::user()->name }}</h1>
@endsection
