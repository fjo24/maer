<?php

namespace App\Http\Controllers\Adm;

use App\Contenido_home;
use Illuminate\Http\Request;
use App\Http\Requests\HomesRequest;
use App\Http\Controllers\Controller;

class ContenidohomesController extends Controller
{
    //'nombre', 'descripcion', 'contenido', 'imagen', 'link',
    public function index()
    {
        $homes = Contenido_home::orderBy('nombre', 'ASC')->get();
        return view('adm.homes.index')->with('homes', $homes);
    }

    public function create()
    {
        return view('adm.homes.create');
    }

    public function store(Request $request)
    {
        $homes              = new Contenido_home();
        $homes->nombre      = $request->nombre;
        $homes->descripcion = $request->descripcion;
        $homes->contenido   = $request->contenido;
        $homes->link        = $request->link;
        $id                  = Contenido_home::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/contenido_home/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $homes->imagen = 'img/contenido_home/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $homes->save();

        return view('adm.dashboard');
    }

    public function edit($id)
    {
        $homes  = Contenido_home::find($id);
        return view('adm.homes.edit')
            ->with('homes', $homes);
    }

    public function update(Request $request, $id)
    {
        $homes              = Contenido_home::find($id);
        $homes->nombre      = $request->nombre;
        $homes->descripcion = $request->descripcion;
        $homes->contenido   = $request->contenido;
        $homes->link        = $request->link;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/contenido_home/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $homes->imagen = 'img/contenido_home/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $homes->update();

        return view('adm.dashboard');
    }
}
