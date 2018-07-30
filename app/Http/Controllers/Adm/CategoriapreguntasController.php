<?php

namespace App\Http\Controllers\Adm;

use App\Categoria_pregunta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriapreguntasController extends Controller
{
    public function index()
    {
        $categoria_preguntas = Categoria_pregunta::orderBy('nombre', 'ASC')->get();
        return view('adm.categoria_preguntas.index', compact('categoria_preguntas'));
    }

    public function create()
    {
        $categoria_preguntas = Categoria_pregunta::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.categoria_preguntas.create', compact('categoria_preguntas'));
    }

    public function store(Request $request)
    {

        $categoria_pregunta              = new Categoria_pregunta();
        $categoria_pregunta->nombre      = $request->nombre;
        $categoria_pregunta->save();
        return redirect()->route('categoria_preguntas.index');
    }

    public function edit($id)
    {
        $categoria_preguntas = Categoria_pregunta::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $categoria_pregunta  = Categoria_pregunta::find($id);
        return view('adm.categoria_preguntas.edit', compact('categoria_pregunta', 'categoria_preguntas'));
    }

    public function update(Request $request, $id)
    {
        $categoria_pregunta = Categoria_pregunta::find($id);
        $categoria_pregunta->nombre = $request->nombre;
        $categoria_pregunta->save();
        return redirect()->route('categoria_preguntas.index');
    }

    public function destroy($id)
    {
        $categoria_pregunta = Categoria_pregunta::find($id);
        $categoria_pregunta->delete();
        return redirect()->route('categoria_preguntas.index');
    }
}
