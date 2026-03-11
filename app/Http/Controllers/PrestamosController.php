<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\User;

class PrestamosController extends Controller
{
    //
    public function index()
    {
        $prestamos = Prestamo::with(['usuario', 'libro'])
            ->latest()
            ->paginate(10);

        return view('admin.prestamos.index', compact('prestamos'));
    }

    public function create()
    {

        return view('admin.prestamos.create');
    }

    public function buscar_usuario(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $usuario_nombre = $request->input('usuario_nombre');

        if (!empty($usuario_id)) {
            $usuario = User::where('id', $usuario_id)->first();
        } elseif (!empty($usuario_nombre)) {
            $usuario = User::where('name', 'like', '%' . $usuario_nombre . '%')->first();
        } else {
            return redirect()->back()->with('error', 'Por favor ingrese un ID o nombre de usuario');
        }

        return view('admin.prestamos.create', compact('usuario'));
    }
}
