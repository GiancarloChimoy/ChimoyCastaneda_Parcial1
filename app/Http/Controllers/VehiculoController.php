<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;


class VehiculoController extends Controller
{
    //
    public function create()
    {
        return view('cursos.form', ['cursos' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'propietario' => 'required|string|max:255',
        ]);
    
        $vehiculo = new Vehiculo([
            'placa' => $request->get('placa'),
            'modelo' => $request->get('modelo'),
            'propietario' => $request->get('propietario'),
        ]);
    
        $vehiculo->save();
    
        return redirect()->route('home')->with('status', 'Vehiculo registrado con éxito');
    }
    
    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();

        return redirect()->route('home')->with('status', 'Vehiculo eliminado correctamente.');
    }
}
