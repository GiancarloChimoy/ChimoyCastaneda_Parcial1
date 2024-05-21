<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function create()
    {
        return view('cursos.form', ['curso' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:cursos,codigo',
            'numero_creditos' => 'required|integer',
        ]);

        Curso::create($request->all());

        return redirect()->route('home')->with('status', 'Curso registrado correctamente.');
    }

    
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.form', compact('curso'));
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:cursos,codigo,' . $curso->id,
            'numero_creditos' => 'required|integer',
        ]);

        $curso->update($request->all());

        return redirect()->route('home')->with('status', 'Curso actualizado correctamente.');
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('home')->with('status', 'Curso eliminado correctamente.');
    }
}
