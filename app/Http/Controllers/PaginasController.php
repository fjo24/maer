<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Contenido_home;
use App\Contenido_calidad;
use App\Pregunta;
use App\User;
use App\Dato;
use App\Banner;
use App\Calidad;
use App\Destacado_home;
use App\Destacado_mantenimiento;
use App\Empresa;
use App\Rubro;
use App\Tiempo;
use App\Novedad;
use App\Video;
use App\Metadato;
use App\Producto;
use App\Servicio;   
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaginasController extends Controller
{
    public function home()
    {
        $activo    = 'home';
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'home')->get();
        $bloque1   = Destacado_home::find(1);
        $bloque2   = Destacado_home::find(2);
        $bloque3   = Destacado_home::find(3);
        $bloque4   = Destacado_home::find(4);
        $contenido = Contenido_home::all()->first();
        return view('pages.home', compact('sliders', 'servicios', 'banner', 'contenido', 'activo', 'bloque1', 'bloque2', 'bloque3', 'bloque4'));
    }
    public function empresa()
    {
        $activo    = 'empresa';
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'empresa')->get();
        $tiempos   = Tiempo::orderBy('ano', 'ASC')->get();
        $empresa = Empresa::all()->first();
        return view('pages.empresa', compact('sliders', 'empresa', 'activo', 'tiempos'));
    }

    public function videos()
    {
        $activo    = 'videos';
        $videos = Video::orderBy('nombre', 'ASC')->get();
        return view('pages.videos', compact('videos', 'activo'));
    }

    public function rubros()
    {
        $activo    = 'productos';
        $ready = 0;
        $categoria = 99;
        $productos = Producto::OrderBy('orden', 'asc')->get();
        $categorias = Rubro::OrderBy('orden', 'asc')->get();
        return view('pages.rubros', compact('productos', 'categoria', 'ready', 'categorias', 'id', 'activo'));
    }

    public function rubroproductos($id)
    {
        $activo    = 'productos';
        $categoria = Rubro::find($id);
        $ready = 0;
        $productos = Producto::OrderBy('orden', 'asc')->where('rubro_id', $id)->get();
        $categorias = Rubro::OrderBy('orden', 'asc')->get();
        return view('pages.rubroproductos', compact('productos', 'categoria', 'ready', 'categorias', 'id', 'activo'));
    }

    public function sistemas()
    {
        $activo    = 'productos';
        $ready = 0;
        $categoria = 99;
        $productos = Producto::OrderBy('orden', 'asc')->get();
        $categorias = Categoria::OrderBy('orden', 'asc')->get();
        return view('pages.sistemas', compact('productos', 'categoria', 'ready', 'categorias', 'id', 'activo'));
    }
    public function productoinfo($id)
    {
        $p     = Producto::find($id);
        $categoria = Rubro::find($p->rubro_id);
        $ready         = 0;
        $relacionados  = Producto::OrderBy('orden', 'ASC')->Where('categoria_id', $p->categoria_id)->get();
        $activo        = 'productos';
        $categorias    = Rubro::OrderBy('orden', 'asc')->get();
        $productos     = Producto::OrderBy('categoria_id', 'ASC')->get();

        return view('pages.productoinfo', compact('categorias', 'categoria', 'productos', 'productos_directos', 'ready', 'activo', 'ref', 'subref', 'sub', 'cat', 'p', 'relacionados'));
    }

    public function productoinfo2($id)
    {
        $p     = Producto::find($id);
        $categoria = Categoria::find($p->categoria_id);
        $ready         = 0;
        $relacionados  = Producto::OrderBy('orden', 'ASC')->Where('categoria_id', $p->categoria_id)->get();
        $activo        = 'productos';
        $categorias    = Categoria::OrderBy('orden', 'asc')->get();
        $productos     = Producto::OrderBy('categoria_id', 'ASC')->get();

        return view('pages.productoinfo2', compact('categorias', 'categoria', 'productos', 'productos_directos', 'ready', 'activo', 'ref', 'subref', 'sub', 'cat', 'p', 'relacionados'));
    }

    public function sistemaproductos($id)
    {
        $activo    = 'productos';
        $categoria = Categoria::find($id);
        $ready = 0;
        $productos = Producto::OrderBy('orden', 'asc')->where('categoria_id', $id)->get();
        $categorias = Categoria::OrderBy('orden', 'asc')->get();
        return view('pages.sistemaproductos', compact('productos', 'categoria', 'ready', 'categorias', 'id', 'activo'));
    }

    public function subcategorias($id)
    {
        $sub           = Categoria::find($id);
        $subref        = $sub->id;
        $ready         = 0;
        $ref           = $sub->id_superior;
        $cat           = Categoria::find($ref);
        $activo        = 'productos';
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $productos     = Producto::orderBy('categoria_id')->get();
        $todos         = Producto::where('categoria_id', $id)->OrderBy('orden', 'ASC')->get();

        return view('pages.subcategorias', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'activo', 'todos', 'ref', 'subref', 'sub', 'cat', 'ready'));
    }

    public function calidad()
    {
        $activo    = 'calidad';
        $banner = Banner::all()->first();
        $contenido = Contenido_calidad::all()->first();
        $inferior = Calidad::all()->first();
        return view('pages.calidad', compact('contenido', 'activo', 'banner', 'inferior'));
    }

    public function preguntas($id)
    {
        $p     = Producto::find($id);
        $categoria = Categoria::find($p->categoria_id);
        $preguntas = Pregunta::OrderBy('pregunta', 'ASC')->Where('categoria_pregunta_id', $p->categoria_pregunta_id)->get();
        $ready         = 0;
        $relacionados  = Producto::OrderBy('orden', 'ASC')->Where('categoria_id', $p->categoria_id)->get();
        $activo        = 'productos';
        $categorias    = Categoria::OrderBy('orden', 'asc')->get();
        $productos     = Producto::OrderBy('categoria_id', 'ASC')->get();

        return view('pages.preguntas', compact('categorias', 'categoria', 'productos', 'preguntas', 'ready', 'activo', 'ref', 'subref', 'sub', 'cat', 'p', 'relacionados'));
    }

    public function despiece($id)
    {
        $producto = Producto::find($id);
        $path     = public_path();
        $url      = $path . '/' . $producto->despiece;
        return response()->download($url);
        return redirect()->route('productoinfo', $id);
    }

    public function manual($id)
    {
        $producto = Producto::find($id);
        $path     = public_path();
        $url      = $path . '/' . $producto->manual;
        return response()->download($url);
        return redirect()->route('productoinfo', $id);
    }

    public function dondeComprar()
    {
        $activo = 'donde';
        $mapas  = User::where('activo', 1)->get();

        return view('pages.donde', compact('mapas', 'activo'));
    }

    public function dondeComprarlistado()
    {
        $activo = 'donde';
        $mapas  = User::where('activo', 1)->get();

        return view('pages.dondelistado', compact('mapas', 'activo'));
    }


    public function contacto()
    {
        //return ($producto);
        $activo = 'contacto';
        return view('pages.contacto', compact('activo'));
    }

    public function enviarmailcontacto(Request $request)
    {
        $activo   = 'contacto';
        $dato     = Dato::where('tipo', 'mail')->first();
        $nombre   = $request->nombre;
        $apellido = $request->apellido;
        $empresa  = $request->empresa;
        $email    = $request->email;
        $mensaje  = $request->mensaje;
       //     dd($producto);
        Mail::send('pages.emails.contactomail', ['nombre' => $nombre, 'apellido' => $apellido, 'empresa' => $empresa, 'email' => $email, 'mensaje' => $mensaje], function ($message){



            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'Maer');

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject('Consulta desde web');

        });
        if (Mail::failures()) {
            return view('pages.contacto', compact('activo'));
        }
        return view('pages.contacto', compact('activo'));
    }

    public function buscar(Request $request)
    {

        $busqueda = $request->buscar;

        $busca = 1;
        $ready = 0;
        //$metadatos = Metadato::where('section','buscar')->get();
        $activo    = 'productos';
        $productos = Producto::where('nombre', 'like', '%' . $busqueda . '%')->
            orwhere('codigo', 'like', '%' . $busqueda . '%')->get();

        $activo        = 'productos';
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $productos     = Producto::orderBy('categoria_id')->get();
        $todos         = Producto::where('nombre', 'like', '%' . $busqueda . '%')->
            orwhere('codigo', 'like', '%' . $busqueda . '%')->get();
        $ready = 0;

        return view('pages.productos', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'activo', 'todos', 'ready'));

    }
}
