<?php

namespace App\Http\Controllers\Adm;

use App\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaRequest;

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

    public function update(Request $request, $id)
    {
        $empresa              = Empresa::find($id);
        $empresa->nombre      = $request->nombre;
        $empresa->descripcion = $request->descripcion;
        $empresa->contenido   = $request->contenido;
        $empresa->link        = $request->link;
        $empresa->texto1      = $request->texto1;
        $empresa->numero1     = $request->numero1;
        $empresa->texto2      = $request->texto2;
        $empresa->numero2     = $request->numero2;
        $empresa->texto3      = $request->texto3;
        $empresa->numero3     = $request->numero3;

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
