<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Contenido_home;
use App\User;
use App\Dato;
use App\Destacado_home;
use App\Destacado_mantenimiento;
use App\Empresa;
use App\Local;
use App\Tiempo;
use App\Novedad;
use App\Contactotext;
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

    public function categorias(){
        $activo    = 'productos';
        $metadato= metadato::where('seccion','productos')->first();
        $categorias = Categoria::OrderBy('orden', 'asc')->get();
        return view('pages.categorias', compact('categorias', 'metadato', 'activo'));
    }

    public function productos()
    {
        $activo        = 'productos';
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $productos     = Producto::orderBy('categoria_id')->get();
        $todos         = Producto::OrderBy('orden', 'ASC')->get();
        $ready         = 0;

        return view('pages.productos', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'activo', 'todos', 'ready'));
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

    public function mantenimiento()
    {
        $activo    = 'mantenimiento';
        $servicios = Servicio::OrderBy('orden', 'ASC')->get();
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'mantenimiento')->get();
        $contenido = Destacado_mantenimiento::all()->first();
        return view('pages.mantenimiento', compact('sliders', 'servicios', 'contenido', 'activo'));
    }

    public function productoinfo($id)
    {
        $p     = Producto::find($id);
        $idsub = $p->categoria_id;
        $sub   = Categoria::find($idsub);
        if ($sub->id_superior != null) {
            $cat = Categoria::find($sub->id_superior);
        } else {
            $cat = Categoria::find($idsub);
        }
        $ready         = 0;
        $relacionados  = Producto::OrderBy('orden', 'ASC')->Where('categoria_id', $p->categoria_id)->get();
        $subref        = $sub->id;
        $ref           = $sub->id_superior;
        $activo        = 'productos';
        $categorias    = Categoria::where('id_superior', null)->orderBy('orden', 'asc')->get();
        $subcategorias = Categoria::whereNotNull('id_superior')->orderBy('orden', 'asc')->get();
        $productos     = Producto::orderBy('categoria_id')->get();

        return view('pages.producto', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'ready', 'activo', 'ref', 'subref', 'sub', 'cat', 'p', 'relacionados'));
    }

    public function novedades($tipo)
    {
        $activo    = 'novedades';
        $tipon     = $tipo;
        $ready     = 0;
        $novedades = Novedad::OrderBy('orden', 'ASC')->get();
        return view('pages.novedades', compact('tipon', 'novedades', 'activo', 'ready'));
    }

    public function novedadesinfo($id)
    {
        $novedad = Novedad::find($id);
        $tipon   = $novedad->seccion;
        $activo  = 'novedades';
        return view('pages.novedadinfo', compact('novedad', 'activo', 'tipon'));
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


    public function contacto($producto)
    {
        //return ($producto);
        $activo = 'contacto';
        $contacto   = Contactotext::all()->first();
        $contenido = $contacto->contenido;
        $dato = $producto;
        return view('pages.contacto', compact('activo', 'producto', 'contenido'));
    }

    public function enviarmail(Request $request)
    {
        $activo   = 'contacto';
        $dato     = Dato::where('tipo', 'mail')->first();
        $producto = $request->producto;
        $nombre   = $request->nombre;
        $apellido = $request->apellido;
        $empresa  = $request->empresa;
        $email    = $request->email;
        $mensaje  = $request->mensaje;
       //     dd($producto);
        Mail::send('pages.emails.contactomail', ['nombre' => $nombre, 'apellido' => $apellido, 'empresa' => $empresa, 'email' => $email, 'mensaje' => $mensaje, 'producto' => $producto], function ($message) use ($producto){



            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'Parpen');

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject('Consulta de web de producto: ' .$producto);

        });
        if (Mail::failures()) {
            return view('pages.contacto', compact('activo', 'General'));
        }
        $producto = 'General';
        return view('pages.contacto', compact('activo', 'producto'));
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
