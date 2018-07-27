<?php

namespace App\Http\Controllers\Adm;

use App\Empresa;
use App\Http\Requests\EmpresaRequest;

use App\Http\Controllers\Controller;

class EmpresasController extends Controller
{
    //'nombre', 'descripcion', 'contenido', 'imagen', 'link',

    public function create()
    {
        $empresa = Empresa::all()->first();
        return redirect()->route('empresas.edit', $empresa->id);
    }

    public function edit($id)
    {
        $empresa = Empresa::find($id);
        return view('adm.empresas.edit')
            ->with('empresa', $empresa);
    }

    public function update(empresaRequest $request, $id)
    {
        $empresa              = Empresa::find($id);
        $empresa->nombre      = $request->nombre;
        $empresa->descripcion = $request->descripcion;
        $empresa->contenido   = $request->contenido;
        $empresa->link        = $request->link;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/empresa/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $empresa->imagen = 'img/empresa/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $empresa->update();

        return view('adm.dashboard');
    }
}
