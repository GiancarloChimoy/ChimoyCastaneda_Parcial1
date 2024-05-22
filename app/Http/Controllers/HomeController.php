<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        // Si hay una búsqueda, filtra los cursos por nombre, código o ID; de lo contrario, obtiene todos los cursos
        if ($search) {
            $vehiculos = Vehiculo::query()
                ->where('placa', 'LIKE', "%{$search}%")
                ->orWhere('propietario', $search)
                ->orWhere('id', $search)
                ->get();

            // Verifica si se encontraron cursos
            if ($vehiculos->isEmpty()) {
                $mensaje = "Vehiculo no encontrado o inexistente";
            } else {
                $mensaje = "";
            }
        } else {
            $vehiculos = Vehiculo::all();
            $mensaje = "";
        }

        return view('home', compact('vehiculos', 'search', 'mensaje'));
    }
}

