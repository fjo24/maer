<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Novedad;
use App\Categoria_novedad;

class NovedadesController extends Controller
{
    public function index()
    {
    	$novedades = Novedad::all();  	
    	$categorias = Categoria_novedad::orderBy('nombre','asc')->get();
    	$categories = Categoria_novedad::orderBy('nombre','asc')->get();
      	$activo='novedades';
        return view('pages.novedades', compact('novedades', 'categories','categorias', 'activo'));
    }

    public function filter($id)
    {        
    	$categorias = Categoria_novedad::orderBy('nombre','asc')->get();
    	$categories = Categoria_novedad::orderBy('orden','asc')->where('id', $id)->get();
 		$novedades = Novedad::orderBy('fecha','asc')->get();     
    	$activo='novedades';
        return view('pages.novedades', compact('novedades','categorias','categories','activo'));
    }    

    public function buscar(Request $request)
    {
      $activo='novedades';
        $buscar = $request->buscar;

        $categorias = Categoria_novedad::orderBy('orden','asc')->get();
        $categories = Categoria_novedad::orderBy('orden','asc')->get();

        $novedades = Novedad::where('nombre',$buscar)->orWhere('nombre','like','%'.$buscar.'%')->get();   

        if(count($novedades)== 0){
          $novedades = Novedad::where('contenido',$buscar)->orWhere('contenido','like','%'.$buscar.'%')->get();  
        }

        return view('pages.novedades', compact('novedades','categorias','categories','activo'));
    }
    
}