<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Descuento;

class DescuentosController extends Controller
{
     public function index()
    {
        $descuentos = Descuento::orderBy('minimo', 'ASC')->get();
        return view('adm.descuentos.index', compact('descuentos'));
    }

    public function create()
    {
        $descuentos = Descuento::orderBy('minimo', 'ASC')->pluck('minimo', 'id')->all();
        return view('adm.descuentos.create', compact('descuentos'));
    }

    public function store(Request $request)
    {

        $descuento              = new Descuento();
        $descuento->minimo      = $request->minimo;
        $descuento->maximo      = $request->maximo;
        $descuento->porcentaje  = $request->porcentaje;
        $descuento->save();
        return redirect()->route('descuentos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $descuento  = Descuento::find($id);
        return view('adm.descuentos.edit', compact('descuento', 'descuentos'));
    }

    public function update(Request $request, $id)
    {
        $descuento = Descuento::find($id);
        $descuento->minimo      = $request->minimo;
        $descuento->maximo      = $request->maximo;
        $descuento->porcentaje  = $request->porcentaje;
        $descuento->update();
        return redirect()->route('descuentos.index');
    }

    public function destroy($id)
    {
        $descuento = Descuento::find($id);
        $descuento->delete();
        return redirect()->route('descuentos.index');
    }
}
