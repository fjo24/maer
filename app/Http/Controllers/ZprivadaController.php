<?php

namespace App\Http\Controllers;

use App\Catalogo;
use App\Dato;
use App\Descuento;
use App\Pedido;
use App\Producto;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ZprivadaController extends Controller
{
    public function productos()
    {
        $activo    = 'pedidos';
        $carrito   = Cart::content();
        $items     = $carrito->all();
        $ready     = 0;
        $config    = 4;
        $shop      = 0;
        $productos = Producto::OrderBy('orden', 'ASC')->where('visible', '<>', 'privado')->get();
        $aux       = Producto::orderBy('orden', 'ASC')->get();
        $prod      = $aux->toJson();
        // dd($carrito->all());
        return view('privada.productos', compact('modelos', 'shop', 'carrito', 'activo', 'productos', 'ready', 'prod', 'config', 'items'));
    }

    public function add(Request $request)
    {
        $descuentos  = Descuento::OrderBy('porcentaje', 'ASC')->get();
        $activo    = 'productos';
        $carrito   = Cart::content();
        $items     = $carrito->all();
        $ready     = 0;
        $config    = 4;
        $im        = 0;
        $shop      = 0;
        $total_items = 0;
        $productos = Producto::OrderBy('orden', 'ASC')->get();
        $producto  = Producto::find($request->id);
        foreach ($producto->imagenes as $img) {
            $imagen = $img->imagen;
            if ($im == 0) {
                break;
            }
        }
        foreach($producto->modelos as $modelo){
            $codigo = $modelo->codigo;
            if ($im == 0) {
                break;
            }
        }            

        $categoria = $producto->categoria->nombre;
        $rubro = $producto->rubro->nombre;

        if ($request->cantidad > 0) {
            Cart::add(['id' => $producto->id, 'name' => $producto->nombre, 'price' => $producto->precio, 'qty' => $request->cantidad, 'options' => ['orden' => $producto->orden, 'imagen' => $imagen, 'categoria' => $categoria, 'rubro' => $rubro]]);
            //dd($categoria);
            return redirect()->route('zproductos', compact('shop', 'carrito', 'activo', 'productos', 'ready', 'prod', 'config', 'items', 'codigo', 'desc'));
        } else {
            return back();
        }
    }

    public function carrito(Request $request)
    {


        $activo = 'carrito';
        $descuentos  = Descuento::OrderBy('porcentaje', 'ASC')->get();
        $total_items = 0;
        $subtotal    = Cart::Subtotal();
        $total       = Cart::Total();
        $carrito     = Cart::content();
        $total      = str_replace(',', '', $total);
        $subtotal   = str_replace(',', '', $subtotal);
        $diferencia = null;
        $desc = 0;

        if (count($carrito)>0) {
            # code...
        foreach (Cart::content() as $row) {
            $total_items = $total_items + $row->qty;
        }

      //  dd($total_items);
        foreach ($descuentos as $descuento) {
            if ($total_items >= $descuento->minimo) {
                $desc    = $descuento->porcentaje;
                $id_desc = $descuento->id;
                $sw = 1;
            } else {
                if ($sw=1) {
                    break;
                }else{                    
                    $desc    = 0;
                    $id_desc = null;
                }
            }
        }
//ubicar la diferencia para proximo descuento
        $max               = Descuento::all()->max('minimo');
        $maximo = Descuento::Where('minimo', $max)->first();
        //dd($maximo);
        $diferencia=null;
        if ($maximo->id==$id_desc) {
            $diferencia==null;
        }else{
        $proximo = Descuento::find($id_desc+1);
        $diferencia = $proximo->minimo-$total_items;
        }

//dd($desc);
//descuento en pesos
        $constante = $desc/100;
        $descuento = $subtotal*$constante;
//iva
        $subtotal_desc = $subtotal-$descuento;
        $iva = $subtotal_desc*0.21;
//total
        $totales = ($subtotal-$descuento)+$iva;
      //  $descuento = $total;
        }
        return view('privada.carrito', compact('activo', 'desc', 'descuento', 'iva', 'totales', 'descuentos', 'diferencia', 'proximo'));
    }

    public function send(Request $request)
    {
        $fecha       = Carbon::now()->format('Y-m-d');
        $descuentos  = Descuento::OrderBy('porcentaje', 'ASC')->get();
        $activo      = 'carrito';
        $total_items = 0;
        $dato        = Dato::where('tipo', 'email')->first();
        $subtotal    = Cart::Subtotal();
        $total       = Cart::Total();
        $carrito     = Cart::content();

        $total      = str_replace(',', '', $total);
        $subtotal   = str_replace(',', '', $subtotal);

        foreach (Cart::content() as $row) {
            $total_items = $total_items + $row->qty;
        }
        foreach ($descuentos as $descuento) {
            if ($total_items >= $descuento->minimo) {
                $desc    = $descuento->porcentaje;
                $id_desc = $descuento->id;
                $sw = 1;
            } else {
                if ($sw=1) {
                    break;
                }else{                    
                    $desc    = 0;
                    $id_desc = null;
                }
            }
        }
//descuento en pesos
        $constante = $desc/100;
        $descuento = $subtotal*$constante;
//iva
        $subtotal_desc = $subtotal-$descuento;
        $iva = $subtotal_desc*0.21;
//total
        $totales = ($subtotal-$descuento)+$iva;
        $totales      = str_replace(',', '', $totales);
        $pedido               = new Pedido;
        $pedido->fecha        = $fecha;
        $pedido->total        = $totales;
        $pedido->subtotal     = $subtotal;
        $iva                  = number_format($iva, 2, '.', ',');
        $pedido->iva          = $iva;
        $pedido->fecha        = $fecha;
        $pedido->descuento_id = $id_desc;
        $pedido->user_id      = Auth()->user()->id;
        $pedidoid             = Pedido::all()->max('id');
        $pedidoid++;
        //dd($pedidoid);
        //dd(count($carrito));
        $pedido->save();

        foreach (Cart::content() as $row) {
            $producto = $row->name;
            $cantidad = $row->qty;
            $precio   = $row->price;
            //$idproducto = $row->rowId
            $total_items = $total_items + $row->qty;
            $pedido->productos()->attach($producto, ['cantidad' => $row->qty, 'pedido_id' => $pedidoid, 'producto_id' => $row->id, 'costo' => $row->price * $row->qty]);
        }

        $carrito = Cart::content();
        $items   = $carrito->all();

        $mensaje = $request->input('mensaje');
        // dd($request->total);
        $nombre       = Auth()->user()->name;
        $apellido     = Auth()->user()->apellido;
        $emailcliente = Auth()->user()->email;
        $username     = Auth()->user()->username;
        $social       = Auth()->user()->social;
        $cuit         = Auth()->user()->cuit;
        $telefono     = Auth()->user()->telefono;
        $direccion    = Auth()->user()->direccion;

        Mail::send('privada.mailpedido', ['total' => $total, 'username' => $username, 'nombre' => $nombre, 'apellido' => $apellido, 'social' => $social, 'cuit' => $cuit, 'telefono' => $telefono, 'direccion' => $direccion, 'emailcliente' => $emailcliente, 'items' => $items, 'row' => $row, 'subtotal' => $subtotal, 'mensaje' => $mensaje], function ($message) use ($nombre, $apellido) {

            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'MAER | Pedidos');

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject('Pedido de ' . $nombre . ' ' . $apellido);

        });
        if (count(Mail::failures()) > 0) {

            $failed = 'Ha ocurrido un error al enviar el correo';

        } else {

            $success = 'Pedido enviado correctamente';

        }

        Cart::destroy();
    return redirect()->route('carrito');
     //   return view('privada.carrito', compact('activo', 'success'));

    }

    public function delete($id)
    {
        $activo = 'carrito';
        Cart::remove($id);
        return redirect()->route('carrito');
    }

    public function listadeprecios()
    {
        $activo   = 'listadeprecios';
        $catalogo = Catalogo::orderBy('created_at', 'ASC')->first();

        return view('privada.listadeprecios', compact('activo', 'catalogo'));
    }

    public function historico()
    {
        $activo   = 'historico';
        $pedidos = Pedido::orderBy('id', 'ASC')->Where('user_id', Auth()->user()->id)->get();

        return view('privada.historico', compact('activo', 'pedidos'));
    }

    public function detalle($id)
    {
        $activo   = 'historico';
        $cien = 100;
        $pedido = Pedido::find($id);
        $r = $pedido->subtotal*$pedido->descuento->porcentaje;
        $descuento = $r/100;
        $iva= ($pedido->subtotal - $descuento)*0.21;
        return view('privada.detalle', compact('activo', 'iva','pedido', 'descuento'));
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
        $activo    = 'ofertasynovedades';
        $productos = Producto::OrderBy('orden', 'ASC')->orwhere('tipo', 'novedad')->orwhere('tipo', 'oferta')->get();
        $ready     = 0;

        return view('privada.ofertasynovedades', compact('productos', 'activo', 'ready'));
    }

}
