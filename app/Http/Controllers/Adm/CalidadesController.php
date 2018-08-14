<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calidad;

class CalidadesController extends Controller
{
    public function create()
    {
        $homes = Calidad::all()->first();
        return redirect()->route('calidad.edit', $homes->id);
    }

    public function edit($id)
    {
        $homes = Calidad::find($id);
        return view('adm.calidad.edit')
            ->with('homes', $homes);
    }

    public function update(Request $request, $id)
    {
        $homes              = Calidad::find($id);
        $homes->nombre      = $request->nombre;
        $homes->descripcion = $request->descripcion;
        $homes->descripcion2 = $request->descripcion2;
        $homes->contenido   = $request->contenido;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/calidad/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $homes->imagen = 'img/calidad/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $homes->update();


        return view('adm.dashboard');
    }
}
