<?php

namespace App\Http\Controllers\Adm;

use App\Contenido_calidad;
use Illuminate\Http\Request;
use App\Http\Requests\HomesRequest;
use App\Http\Controllers\Controller;
use App\Banner;

class ContenidocalidadesController extends Controller
{
    //'nombre', 'descripcion', 'contenido', 'imagen', 'link',

    public function create()
    {
        $homes = Contenido_calidad::all()->first();
        return redirect()->route('calidades.edit', $homes->id);
    }

    public function edit($id)
    {
        $homes = Contenido_calidad::find($id);
        return view('adm.calidades.edit')
            ->with('homes', $homes);
    }

    public function update(Request $request, $id)
    {
        $homes              = Contenido_calidad::find($id);
        $homes->nombre      = $request->nombre;
        $homes->descripcion = $request->descripcion;
        $homes->descripcion2 = $request->descripcion2;
        $homes->contenido   = $request->contenido;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/contenido_calidad/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $homes->imagen = 'img/contenido_calidad/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $homes->update();

        return view('adm.dashboard');
    }

    //EDITAR BANNER

    public function banner()
    {
        $banner = Banner::all()->first();
        return redirect()->route('banneredit', $banner->id);
    }

    public function banneredit($id)
    {
        $banner = Banner::find($id);
        return view('adm.calidades.banneredit')
            ->with('banner', $banner);
    }

    public function bannerupdate(Request $request, $id)
    {
        $dato         = Banner::find($id);
        $dato->texto  = $request->texto;
        $id++;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/home/banner/');
                $request->file('imagen')->move($path, 'bannercalidad.jpg');
                $dato->imagen = 'img/home/banner/bannercalidad.jpg';
            }
        }
        $dato->update();

        return view('adm.dashboard');
    }
}
