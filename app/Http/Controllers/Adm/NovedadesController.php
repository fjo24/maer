<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Requests\NovedadesRequest;
use App\Imgnovedad;
use App\Novedad;
use App\Producto;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NovedadesController extends Controller
{
    //'nombre', 'fecha', 'descripcion', 'contenido', 'seccion', 'orden', 'imagen1', 'imagen2', 'producto_id',
    public function index()
    {
        $novedades = Novedad::orderBy('seccion', 'ASC')->get();
        return view('adm.novedades.index', compact('novedades'));
    }

    public function create()
    {
        $productos = Producto::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.novedades.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $novedad                    = new novedad();
        $novedad->nombre            = $request->nombre;
        $novedad->fecha             = $request->fecha;
        $novedad->descripcion       = $request->descripcion;
        $novedad->contenido         = $request->contenido;
        $novedad->seccion           = $request->seccion;
        $novedad->orden             = $request->orden;
        $novedad->imagen1           = $request->imagen1;
        $novedad->imagen2           = $request->imagen2;
        $novedad->producto_id       = $request->producto_id;
        $novedad->save();

        return redirect()->route('novedades.index');
    }

    public function edit($id)
    {
        $novedad = Novedad::find($id);
        $productos = Producto::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.novedades.edit', compact('novedad', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $novedad                    = Novedad::find($id);
        $novedad->nombre            = $request->nombre;
        $novedad->fecha             = $request->fecha;
        $novedad->descripcion       = $request->descripcion;
        $novedad->contenido         = $request->contenido;
        $novedad->seccion           = $request->seccion;
        $novedad->orden             = $request->orden;
        $novedad->imagen1           = $request->imagen1;
        $novedad->imagen2           = $request->imagen2;
        $novedad->producto_id       = $request->producto_id;
        $novedad->save();

        return redirect()->route('novedades.index');
    }

    public function destroy($id)
    {
        $novedad = Novedad::find($id);
        $novedad->delete();
        return redirect()->route('novedades.index');
    }

}
