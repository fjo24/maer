<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Aplicacion;
use App\Http\Controllers\Controller;

class AplicacionesController extends Controller
{
    public function index()
    {
        $aplicaciones = Aplicacion::orderBy('id', 'ASC')->get();
        return view('adm.aplicaciones.index', compact('aplicaciones'));
    }

    public function create()
    {
        return view('adm.aplicaciones.create');
    }

    public function store(Request $request)
    {
        $aplicacion              = new Aplicacion();
        $aplicacion->nombre      = $request->nombre;
        $aplicacion->descripcion = $request->descripcion;
        $aplicacion->orden       = $request->orden;
        $id                  = Aplicacion::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/aplicaciones/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $aplicacion->imagen = 'img/aplicaciones/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $aplicacion->save();

        return redirect()->route('aplicaciones.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $aplicacion       = Aplicacion::find($id);
        return view('adm.aplicaciones.edit', compact('aplicacion'));
    }

    public function update(Request $request, $id)
    {
        $aplicacion                    = Aplicacion::find($id);
        $aplicacion->nombre      = $request->nombre;
        $aplicacion->descripcion = $request->descripcion;
        $aplicacion->orden       = $request->orden;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/aplicaciones/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $aplicacion->imagen = 'img/aplicaciones/' . $id . '_' . $file->getClientOriginalName();
            }
        }

        $aplicacion->save();
        return redirect()->route('aplicaciones.index');
    }

    public function destroy($id)
    {
        $aplicacion = Aplicacion::find($id);
        $aplicacion->delete();
        return redirect()->route('aplicaciones.index');
    }
}
