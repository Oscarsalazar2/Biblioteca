<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Libro;

class LibrosController extends Controller
{
    public function index()
    {
        $libros = Libro::with('categoria')->get();
        return view('admin.Libros.index', compact('libros'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.Libros.create', compact('categorias'));
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        $categorias = Categoria::all();

        return view('admin.Libros.edit', compact('libro', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'isbn' => 'required|unique:libros,isbn',
            'editorial' => 'required',
            'id_categoria' => 'required|exists:categorias,id',
        ]);

        Libro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'isbn' => $request->isbn,
            'editorial' => $request->editorial,
            'id_categoria' => $request->id_categoria,
        ]);

        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'isbn' => 'required|unique:libros,isbn,' . $id,
            'editorial' => 'required',
            'id_categoria' => 'required|exists:categorias,id',
        ]);

        $libro = Libro::findOrFail($id);
        $libro->update([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'isbn' => $request->isbn,
            'editorial' => $request->editorial,
            'id_categoria' => $request->id_categoria,
        ]);

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente.');
    }
}
