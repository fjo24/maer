<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tiempo;

class TiempoController extends Controller
{
    public function index()
    {
        $tiempos = Tiempo::orderBy('ano', 'ASC')->paginate(10);
        return view('adm.tiempos.index')
            ->with('tiempos', $tiempos);
    }

    public function create()
    {
        return view('adm.tiempos.create');
    }

    public function store(Request $request)
    {
        $tiempo          = new tiempo();
        $tiempo->parrafo   = $request->parrafo;
        $tiempo->ano  = $request->ano;
        $tiempo->save();

        return redirect()->route('tiempos.index');

    }
    public function edit($id)
    {
        $tiempo = tiempo::find($id);
        return view('adm.tiempos.edit')
            ->with('tiempo', $tiempo);
    }
    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $tiempo          = tiempo::find($id);
        $tiempo->parrafo   = $request->parrafo;
        $tiempo->ano  = $request->ano;
        $tiempo->update();
        return redirect()->route('tiempos.index');
    }

    public function destroy($id)
    {
        $tiempo = tiempo::find($id);
        $tiempo->delete();
        return redirect()->route('tiempos.index');
    }
}
