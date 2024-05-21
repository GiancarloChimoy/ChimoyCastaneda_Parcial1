<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
{
    $search = $request->input('search');

    // Si hay una búsqueda, filtra los cursos por nombre, código o ID; de lo contrario, obtiene todos los cursos
    if ($search) {
        $cursos = Curso::query()
            ->where('nombre', 'LIKE', "%{$search}%")
            ->orWhere('codigo', $search)
            ->orWhere('id', $search)
            ->get();

        // Verifica si se encontraron cursos
        if ($cursos->isEmpty()) {
            $mensaje = "Curso no encontrado o inexistente";
        } else {
            $mensaje = "";
        }
    } else {
        $cursos = Curso::all();
        $mensaje = "";
    }

    return view('home', compact('cursos', 'search', 'mensaje'));
}

    
}
