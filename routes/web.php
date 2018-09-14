<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('logindistribuidor', 'Auth\LoginDistribuidorController@login')->name('logindistribuidor');


Route::get('/home', 'Adm\AdminController@admin')->name('home');
/*******************PAGINAS************************/
//HOME
Route::get('/', 'PaginasController@home')->name('inicio');
//BUSCADOR
Route::post('productos/buscar', [
    'uses' => 'PaginasController@buscar',
    'as'   => 'buscar',
]);

//VIDEOS
Route::get('/videos', 'PaginasController@videos')->name('videos');

//EMPRESAS
Route::get('/empresa', 'PaginasController@empresa')->name('empresa');

//CALIDAD
Route::get('/calidad', 'PaginasController@calidad')->name('calidad');

//INFO DE PRODUCTO
Route::get('productoinfo/{id}/{cat}', 'PaginasController@productoinfo')->name('productoinfo');

//INFO DE PRODUCTO
Route::get('productoinfo2/{id}', 'PaginasController@productoinfo2')->name('productoinfo2');

//CONTACTO
Route::get('/contacto', 'PaginasController@contacto')->name('contacto');
Route::post('enviar-mailcontacto', [
    'uses' => 'PaginasController@enviarmailcontacto',
    'as'   => 'enviarmailcontacto',
]);

//PREGUNTAS
Route::get('/preguntas/{id}',  'PaginasController@preguntas')->name('preguntas');

//NOVEDADES
Route::get('novedad/{id}', ['uses' => 'page\NovedadController@index', 'as' => 'novedad']);
    Route::get('pagenovedades', ['uses' => 'page\NovedadesController@index', 'as' => 'pagenovedades']);
    Route::get('filter/{id_categoria}', ['uses' => 'page\NovedadesController@filter', 'as' => 'filter']);
    Route::get('filter_novedades/{id}', ['uses' => 'page\NovedadesController@show', 'as' => 'filter_novedades']);
    Route::post('search', ['uses' => 'page\NovedadesController@buscar', 'as' => 'buscar_novedad']);

//FILTRO PRODUCTOS POR RUBROS
Route::get('/rubroproductos/{id}',  'PaginasController@rubroproductos')->name('rubroproductos');

// DESPIECE
Route::get('despiece/{id}', ['uses' => 'PaginasController@despiece', 'as' => 'despiece']);

// MANUAL
Route::get('manual/{id}', ['uses' => 'PaginasController@manual', 'as' => 'manual']);

//PRODUCTOS POR RUBROS
Route::get('/rubros', 'PaginasController@rubros')->name('rubros');

//FILTRO PRODUCTOS POR SISTEMAS
Route::get('/sistemaproductos/{id}',  'PaginasController@sistemaproductos')->name('sistemaproductos');

//PRODUCTOS POR RUBROS
Route::get('/sistemas', 'PaginasController@sistemas')->name('sistemas');

//CATEGORIAS
Route::get('/categorias', 'PaginasController@categorias');

//REGISTRO DE DISTRIBUIDORES
Route::get('registro', ['uses' => 'DistribuidorController@index', 'as' => 'registro']);
Route::post('/registro', ['uses' => 'DistribuidorController@store', 'as' => 'cliente.store']);
Route::post('/nuevousuario', ['uses' => 'DistribuidorController@registroStore', 'as' => 'registro.store']);

/*******************ADMIN************************/
    Route::prefix('adm')->middleware('admin')->middleware('auth')->group(function () {


    Route::get('/', 'Adm\AdminController@dashboard')->name('dashboard')->middleware('admin');

    //DASHBOARD
    Route::get('/dashboard', 'Adm\AdminController@admin')->middleware('admin');

    /*------------CATEGORIA NOVEDADES----------------*/
    Route::resource('categorianovedades', 'Adm\CategorianovedadesController')->middleware('admin');

    /*------------SISTEMAS----------------*/
    Route::resource('categorias', 'Adm\CategoriasController')->middleware('admin');

    /*------------RUBROS----------------*/
    Route::resource('rubros', 'Adm\RubrosController')->middleware('admin');

    /*------------MODELOS----------------*/
    Route::resource('modelos', 'Adm\ModelosController')->middleware('admin');

    /*------------APLICACIONES----------------*/
    Route::resource('aplicaciones', 'Adm\AplicacionesController')->middleware('admin');

    /*------------PRODUCTOS----------------*/
    Route::resource('productos', 'Adm\ProductosController')->middleware('admin');
    /*------------Imagen----------------*/
    Route::get('producto/{producto_id}/imagenes/', 'Adm\ProductosController@imagenes')->name('imgproducto.lista'); //index del modulo imagenes
    //agregar nuevas imagenes de productos
    Route::post('producto/nuevaimagen/{id}', 'Adm\ProductosController@nuevaimagen')->name('imgproducto.nueva'); //es el store de las imagenes
    Route::delete('imgproducto/{id}/destroy', [
        'uses' => 'Adm\ProductosController@destroyimg',
        'as'   => 'imgproducto.destroy',
    ])->middleware('admin');


    /*------------LINEA DE TIEMPO----------------*/
    Route::resource('tiempos', 'Adm\TiempoController')->middleware('admin');

    /*------------CONTENIDO HOMES----------------*/
    Route::resource('homes', 'Adm\ContenidohomesController')->middleware('admin');

    /*------------CONTENIDO CALIDADES----------------*/
    Route::resource('calidades', 'Adm\ContenidocalidadesController')->middleware('admin');

    /*------------CALIDAD----------------*/
    Route::resource('calidad', 'Adm\CalidadesController')->middleware('admin');

    /*---------------BANNER CALIDAD------------------*/
    Route::get('/banner', 'adm\ContenidocalidadesController@banner')->name('banner')->middleware('admin');
    Route::get('/banner/{banner_id}', 'adm\ContenidocalidadesController@banneredit')->name('banneredit')->middleware('admin');
    Route::put('/banner/{banner_id}/update', 'adm\ContenidocalidadesController@bannerupdate')->name('bannerupdate')->middleware('admin');

    /*------------NOVEDADES----------------*/
    Route::resource('novedades', 'Adm\NovedadesController')->middleware('admin');

    /*------------DATOS----------------*/
    Route::resource('datos', 'Adm\DatosController')->middleware('admin');

    /*------------DESTACADO HOMES----------------*/
    Route::resource('destacadoshomes', 'Adm\DestacadohomesController')->middleware('admin');

    /*------------EMPRESAS----------------*/
    Route::resource('empresas', 'Adm\EmpresasController')->middleware('admin');

    /*------------REDES----------------*/
    Route::resource('redes', 'Adm\RedesController')->middleware('admin');

    /*------------SLIDERS----------------*/
    Route::resource('sliders', 'Adm\SlidersController')->middleware('admin');

    /*------------USERS----------------*/
    Route::resource('users', 'Adm\UsersController')->middleware('admin');

    /*------------DISTRIBUIDORES----------------*/
    Route::resource('distribuidores', 'Adm\DistribuidoresController')->middleware('admin');

    /*------------METADATOS----------------*/
    Route::resource('metadatos', 'Adm\MetadatosController')->middleware('admin');

    /*------------CATEGORIA DE PREGUNTAS----------------*/
    Route::resource('categoria_preguntas', 'Adm\CategoriapreguntasController')->middleware('admin');

    /*------------PREGUNTAS----------------*/
    Route::resource('preguntas', 'Adm\PreguntasController')->middleware('admin');

    /*------------VIDEOS----------------*/
    Route::resource('videos', 'Adm\VideosController')->middleware('admin');

    /*------------DESCUENTOS----------------*/
    Route::resource('descuentos', 'Adm\DescuentosController')->middleware('admin');

    /*------------CATALOGOS----------------*/
    Route::resource('catalogos', 'Adm\CatalogosController')->middleware('admin');
    // Rutas de reportes pdf
    Route::get('pdf/{id}', ['uses' => 'Adm\CatalogosController@downloadPdf', 'as' => 'file-pdf']);
    
});

//****************************************ZONA PRIVADA**************************************************************************************************************************************************
Route::get('/zonaprivada/productos', 'ZprivadaController@productos')->name('zproductos')->middleware('auth');
//BUSCADOR
Route::post('/buscador', ['uses' => 'BuscadorController@getProducts', 'as' => 'buscador']);

//novedades y ofertas
Route::get('/zonaprivada/ofertasynovedades', 'ZprivadaController@ofertasynovedades')->name('ofertasynovedades')->middleware('auth');

//HISTORICO
Route::get('/zonaprivada/historico', 'ZprivadaController@historico')->name('historico')->middleware('auth');

//VER DETALLE
Route::get('/zonaprivada/detalle/{id}', 'ZprivadaController@detalle')->name('detalle')->middleware('auth');

//LISTADO DE PRECIOS
Route::get('/zonaprivada/listadeprecios', 'ZprivadaController@listadeprecios')->name('listadeprecios')->middleware('auth');
// Rutas de reportes pdf desde la web
    Route::get('pdf2/{id}', ['uses' => 'ZprivadaController@downloadPdf2', 'as' => 'file-pdf2']);


//CARRITO
Route::group(['prefix' => 'carrito'], function () {
    Route::post('add', ['uses' => 'ZprivadaController@add', 'as' => 'carrito.add'])->middleware('auth');
    Route::get('carrito', ['uses' => 'ZprivadaController@carrito', 'as' => 'carrito'])->middleware('auth');
    Route::get('delete/{id}', ['uses' => 'ZprivadaController@delete', 'as' => 'carrito.delete'])->middleware('auth');
    Route::post('enviar', ['uses' => 'ZprivadaController@send', 'as' => 'carrito.enviar'])->middleware('auth');
});