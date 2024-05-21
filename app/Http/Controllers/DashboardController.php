<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        // Verificar si el usuario está autenticado
        if (auth()->check()) {
            // Si está autenticado, mostrar el dashboard
            return view('dashboard');
        } else {
            // Si no está autenticado, redirigir al login
            return redirect()->route('login');
        }
    }
}
