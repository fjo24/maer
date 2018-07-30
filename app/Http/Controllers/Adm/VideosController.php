<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('nombre', 'ASC')->get();
        return view('adm.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('adm.videos.create', compact('videos'));
    }

    public function store(Request $request)
    {

        $video              = new Video();
        $video->nombre      = $request->nombre;
        $video->descripcion = $request->descripcion;
        $video->video       = $request->video;
        $video->save();
        return redirect()->route('videos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $video  = Video::find($id);
        return view('adm.videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::find($id);
        $video->nombre      = $request->nombre;
        $video->descripcion       = $request->descripcion;
        $video->video       = $request->video;
        $video->update();
        return redirect()->route('videos.index');
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect()->route('videos.index');
    }
}