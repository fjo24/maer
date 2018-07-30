<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Red;
use App\Http\Requests\RedesRequest;

class RedesController extends Controller
{
    //'nombre', 'link',
    public function index()
    {
        $redes = Red::orderBy('nombre', 'ASC')->get();
        return view('adm.redes.index', compact('redes'));
    }

    public function create()
    {
        return view('adm.redes.create');
    }

    public function store(Request $request)
    {

        $red        = new Red();
        $red->nombre = $request->nombre;
        $red->link = $request->link;

        $red->save();
        return redirect()->route('redes.index');
    }

    public function edit($id)
    {
        $red = Red::find($id);
        return view('adm.redes.edit', compact('red'));
    }

    public function update(Request $request, $id)
    {
        $red = Red::find($id);
       
        $red->link = $request->link;

        $red->save();
        return redirect()->route('redes.index');
    }

    public function destroy($id)
    {
        $red = Red::find($id);
        $red->delete();
        return redirect()->route('redes.index');
    }
}