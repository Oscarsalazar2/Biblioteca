<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function dashboard()
    {
        $totalLibros = Libro::count();
        return view('admin.admin', compact('totalLibros'));
    }
}
