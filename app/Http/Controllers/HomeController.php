<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\User;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function dashboard()
    {
        $user = Auth::user();
        if ($user->user_type === 'admin') {
            $totalLibros = Libro::count();
            $totalUsuarios = User::count();
            $totalPrestamos = Prestamo::count();
            $totalPrestamosRetrasados = Prestamo::where('estado', 'retrasado')->count();
            $prestamosRecientes = Prestamo::with(['usuario', 'libro.categoria'])
                ->latest()
                ->take(8)
                ->get();

            $librosPopulares = Prestamo::with('libro')
                ->selectRaw('libro_id, COUNT(*) as total_prestamos')
                ->whereNotNull('libro_id')
                ->groupBy('libro_id')
                ->orderByDesc('total_prestamos')
                ->take(4)
                ->get();

            return view('admin.admin', compact('totalLibros', 'totalUsuarios', 'totalPrestamos', 'totalPrestamosRetrasados', 'prestamosRecientes', 'librosPopulares'));
        } else {
            return view('public.index');
        }
    }
}
