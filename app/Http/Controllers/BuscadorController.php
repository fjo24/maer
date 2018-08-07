<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    public function index()
    {
        $busca = 0;
        //$metadatos = Metadato::where('section','buscar')->get();
        $active = 'buscar';
        return view('privada.productos', compact('metadatos', 'active', 'busca'));
    }

    public function getProducts(Request $request)
    {

        $busqueda = $request->pbuscar;

        $busca = 1;
        $ready = 0;
        $shop  = 0;
        //$metadatos = Metadato::where('section','buscar')->get();
        $activo    = 'productos';
        $productos = Producto::where('nombre', 'like', '%' . $busqueda . '%')->
            orwhere('descripcion', 'like', '%' . $busqueda . '%')->get();
        return view('privada.productos', compact('shop', 'productos', 'busqueda', 'busca', 'metadatos', 'activo', 'ready'));

    }
}
