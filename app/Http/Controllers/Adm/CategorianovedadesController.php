<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorianovedad;

class CategorianovedadesController extends Controller
{
    public function index()
    {
        $categorias = Categorianovedad::orderBy('orden', 'ASC')->get();
        return view('adm.categoria_novedades.index', compact('categorias'));
    }

    public function create()
    {
        return view('adm.categoria_novedades.create');
    }

    public function store(Request $request)
    {

        $categoria              = new Categorianovedad();
        $categoria->nombre      = $request->nombre;
        $categoria->orden       = $request->orden;
        $categoria->save();
        return redirect()->route('categorianovedades.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $categoria  = Categorianovedad::find($id);
        return view('adm.categoria_novedades.edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categorianovedad::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->orden  = $request->orden;
        $categoria->update();
        return redirect()->route('categorianovedades.index');
    } 

    public function destroy($id)
    {
        $categoria = Categorianovedad::find($id);
        $categoria->delete();
        return redirect()->route('categorianovedades.index');
    }
}
