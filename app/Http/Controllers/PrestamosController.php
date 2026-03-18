<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
    public function select_libro(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $usuario = User::find($usuario_id);
        $libros = Libro::orderBy('id')->get();

        return view('admin.prestamos.select_libro', compact('usuario', 'libros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'libro_id' => 'required|exists:libros,id',
            'fecha_entrega' => 'required|date',
            'fecha_devolucion' => 'required|date|after_or_equal:fecha_entrega',
        ]);

        DB::beginTransaction();
        try {
            $libro = Libro::find($request->input('libro_id'));

            if ((int) $libro->estatus === 0) {
                return redirect()->back()->with('error', 'El libro seleccionado no esta disponible.');
            }

            $prestamo = new Prestamo();
            $prestamo->usuario_id = $request->input('usuario_id');
            $prestamo->libro_id = $request->input('libro_id');
            $prestamo->fecha_entrega = $request->input('fecha_entrega');
            $prestamo->fecha_devolucion = $request->input('fecha_devolucion');
            $prestamo->save();

            $libro->estatus = 0;
            $libro->save();

            DB::commit();
            return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado exitosamente.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al registrar el préstamo.');
        }
    }

    public function entregar($id)
    {

        $prestamo = Prestamo::findOrFail($id);
        $prestamo->estado = 'devuelto';
        $prestamo->save();

        $libro = Libro::findOrFail($prestamo->libro_id);
        $libro->estatus = 1;
        $libro->save();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo entregado exitosamente.');
    }

    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        return view('admin.prestamos.edit', compact('prestamo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'libro_id' => 'required|exists:libros,id',
            'fecha_entrega' => 'required|date',
            'fecha_devolucion' => 'required|date|after_or_equal:fecha_entrega',
        ]);

        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update([
            'usuario_id' => $request->usuario_id,
            'libro_id' => $request->libro_id,
            'fecha_entrega' => $request->fecha_entrega,
            'fecha_devolucion' => $request->fecha_devolucion,
        ]);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado exitosamente.');
    }
}
