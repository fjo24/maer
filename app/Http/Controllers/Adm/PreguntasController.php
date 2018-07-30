<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Categoria_pregunta;
use App\Http\Controllers\Controller;

class PreguntasController extends Controller
{
    public function index()
    {
        $preguntas = Pregunta::orderBy('pregunta', 'ASC')->get();
        return view('adm.preguntas.index', compact('preguntas', 'categoria_preguntas'));
    }

    public function create()
    {
        $categoria_preguntas = Categoria_pregunta::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $preguntas = Pregunta::orderBy('pregunta', 'ASC')->pluck('pregunta', 'id')->all();
        return view('adm.preguntas.create', compact('preguntas', 'categoria_preguntas'));
    }

    public function store(Request $request)
    {

        $preguntas              = new Pregunta();
        $preguntas->pregunta      = $request->pregunta;
        $preguntas->respuesta      = $request->respuesta;
        $preguntas->categoria_pregunta_id      = $request->categoria_pregunta_id;
        $preguntas->save();
        return redirect()->route('preguntas.index');
    }

    public function edit($id)
    {
        $categoria_preguntas = Categoria_pregunta::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $pregunta  = Pregunta::find($id);
        return view('adm.preguntas.edit', compact('pregunta', 'categoria_preguntas'));
    }

    public function update(Request $request, $id)
    {
        $pregunta = Pregunta::find($id);
        $pregunta->pregunta = $request->pregunta;
        $pregunta->respuesta = $request->respuesta;
        $pregunta->categoria_pregunta_id = $request->categoria_pregunta_id;
        $pregunta->save();
        return redirect()->route('preguntas.index');
    }

    public function destroy($id)
    {
        $pregunta = Pregunta::find($id);
        $pregunta->delete();
        return redirect()->route('preguntas.index');
    }
}
