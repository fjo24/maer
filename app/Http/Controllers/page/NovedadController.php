<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Novedad;
use App\Categoria_novedad;

class NovedadController extends Controller
{
    public function index($id)
    {
        $novedadI = Novedad::where('id',$id)->first();
        $categorI = Categoria_novedad::where('id',$id)->first();

        $categorias = Categoria_novedad::orderBy('orden','id')->get();
    
        $activo='novedades';

        return view('pages.novedad', compact('novedadI','categorI', 'categorias', 'activo'));
    }

}

/*
    public function show($id)
    {   
        $categoriasX = Categoria::where('id',$id)->orderBy('orden','ASC')->get();
        $novedades = Novedad::orderBy('orden','asc')->get();    
        $categorias = Categoria::orderBy('orden','asc')->get();
                
        $categoriax2 = Categoria::orderBy('orden','ASC')->get();
        $novedades = Novedad::orderBy('orden','ASC')->get();

        return view('page.filter_novedades', [
            'categorias' => $categorias,
            'categoriax2' => $categoriax2,
            'novedades' => $novedades
        ]);
    }
*/

    
