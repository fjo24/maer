<?php

namespace App\Http\Controllers;

use App\Catalogo;
use App\Dato;
use App\Producto;
use App\Pedido;
use Laracasts\Flash\Flash;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ZprivadaController extends Controller
{
    public function productos()
    {
        $activo    = 'productos';
        $carrito   = Cart::content();
        $items     = $carrito->all();
        $ready     = 0;
        $config    = 4;
        $shop      = 0;
        $productos = Producto::OrderBy('orden', 'ASC')->where('visible', '<>', 'privado')->get();
        $aux       = Producto::orderBy('orden', 'ASC')->get();
        $prod      = $aux->toJson();
        // dd($carrito->all());
        return view('privada.productos', compact('shop', 'carrito', 'activo', 'productos', 'ready', 'prod', 'config', 'items'));
    }

    public function add(Request $request)
    {
        $activo    = 'productos';
        $carrito   = Cart::content();
        $items     = $carrito->all();
        $ready     = 0;
        $config    = 4;
        $im = 0;
        $shop      = 0;
        $productos = Producto::OrderBy('orden', 'ASC')->get();
        $producto  = Producto::find($request->id);
        foreach ($producto->imagenes as $img) {
                $imagen= $img->imagen;
            if ($im==0) {
                break;
            }
        }

        $categoria = $producto->categoria->nombre;

        if ($request->cantidad > 0) {
            Cart::add(['id' => $producto->id, 'name' => $producto->nombre, 'price' => $producto->precio, 'qty' => $request->cantidad, 'options' => ['codigo' => $producto->codigo, 'orden' => $producto->orden, 'imagen' => $imagen, 'categoria' => $categoria]]);
           //dd($categoria);
            return redirect()->route('zproductos', compact('shop', 'carrito', 'activo', 'productos', 'ready', 'prod', 'config', 'items', 'codigo'));
        } else {
            return back();
        }
    }

    public function carrito(Request $request)
    {

        $activo = 'pedido';

        return view('privada.carrito', compact('activo'));
    }

    public function send(Request $request)
    {
        $activo = 'carrito';
        $dato   = Dato::where('tipo', 'email2')->first();
        foreach (Cart::content() as $row) {
            $producto = $row->name;
            $cantidad = $row->qty;
            $precio   = $row->price;
            //$idproducto = $row->rowId
        }
        $carrito = Cart::content();
        $items   = $carrito->all();

        $subtotal = Cart::Subtotal();
        $total    = Cart::Total();
        $mensaje  = $request->input('mensaje');
        // dd($request->total);
        $nombre = Auth()->user()->name;
        $apellido = Auth()->user()->apellido;
        $emailcliente = Auth()->user()->email;
        $username = Auth()->user()->username;
        $social = Auth()->user()->social;
        $cuit = Auth()->user()->cuit;
        $telefono = Auth()->user()->telefono;
        $direccion = Auth()->user()->direccion;

        Mail::send('privada.mailpedido', ['total' => $total,'username' => $username, 'nombre' => $nombre,'apellido' => $apellido,'social' => $social,'cuit' => $cuit,'telefono' => $telefono,'direccion' => $direccion,'emailcliente' => $emailcliente, 'items' => $items, 'row' => $row, 'subtotal' => $subtotal, 'mensaje' => $mensaje], function ($message) use ($nombre, $apellido) {

            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'Parpen | Pedidos');

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject('Pedido de '. $nombre. ' ' .$apellido);

        });
        if (count(Mail::failures()) > 0) {

            $failed = 'Ha ocurrido un error al enviar el correo';

        } else {

            $success = 'Pedido enviado correctamente';

        }

        Cart::destroy();

        return view('privada.carrito', compact('activo', 'success'));

    }

    public function delete($id)
    {
        $activo = 'carrito';
        Cart::remove($id);
        return view('privada.carrito', compact('activo'));
    }

    public function listadeprecios()
    {
        $activo    = 'listadeprecios';
        $catalogo = Catalogo::orderBy('created_at', 'ASC')->first();

        return view('privada.listadeprecios', compact('activo', 'catalogo'));
    }

    public function downloadPdf2($id)
    {
        $catalogo = Catalogo::find($id);
        $path     = public_path();
        $url      = $path . '/' . $catalogo->pdf;
        return response()->download($url);
        return redirect()->route('catalogos.index');
    }

    public function ofertasynovedades()
    {
        $activo        = 'ofertasynovedades';
        $productos     = Producto::OrderBy('orden', 'ASC')->orwhere('tipo', 'novedad')->orwhere('tipo', 'oferta')->get();
        $ready         = 0;

        return view('privada.ofertasynovedades', compact('productos', 'activo', 'ready'));
    }

}
