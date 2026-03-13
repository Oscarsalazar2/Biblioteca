<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\User;
Use App\Models\Prestamo;
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
            return view('admin.admin', compact('totalLibros', 'totalUsuarios', 'totalPrestamos', 'totalPrestamosRetrasados'));
        } else {
            return view('public.index');
        }
    }
}
