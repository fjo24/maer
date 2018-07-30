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

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('adm')->group(function () {

    Route::get('/', 'Adm\AdminController@dashboard')->name('dashboard');

    //DASHBOARD
    Route::get('/dashboard', 'Adm\AdminController@admin');

    /*------------SISTEMAS----------------*/
    Route::resource('categorias', 'Adm\CategoriasController');

    /*------------RUBROS----------------*/
    Route::resource('rubros', 'Adm\RubrosController');

    /*------------MODELOS----------------*/
    Route::resource('modelos', 'Adm\ModelosController');

    /*------------APLICACIONES----------------*/
    Route::resource('aplicaciones', 'adm\AplicacionesController');

    /*------------PRODUCTOS----------------*/
    Route::resource('productos', 'Adm\ProductosController');
    /*------------Imagen----------------*/
    Route::get('producto/{producto_id}/imagenes/', 'Adm\ProductosController@imagenes')->name('imgproducto.lista'); //index del modulo imagenes
    //agregar nuevas imagenes de productos
    Route::post('producto/nuevaimagen/{id}', 'Adm\ProductosController@nuevaimagen')->name('imgproducto.nueva'); //es el store de las imagenes
    Route::delete('imgproducto/{id}/destroy', [
        'uses' => 'Adm\ProductosController@destroyimg',
        'as'   => 'imgproducto.destroy',
    ]);


    /*------------LINEA DE TIEMPO----------------*/
    Route::resource('tiempos', 'Adm\TiempoController');

    /*------------CONTENIDO HOMES----------------*/
    Route::resource('homes', 'Adm\ContenidohomesController');

    /*------------CONTENIDO CALIDADES----------------*/
    Route::resource('calidades', 'Adm\ContenidocalidadesController');

    /*---------------BANNER CALIDAD------------------*/
    Route::get('/banner', 'adm\ContenidocalidadesController@banner')->name('banner');
    Route::get('/banner/{banner_id}', 'adm\ContenidocalidadesController@banneredit')->name('banneredit');
    Route::put('/banner/{banner_id}/update', 'adm\ContenidocalidadesController@bannerupdate')->name('bannerupdate');

    /*------------DATOS----------------*/
    Route::resource('datos', 'Adm\DatosController');

    /*------------DESTACADO HOMES----------------*/
    Route::resource('destacadoshomes', 'Adm\DestacadohomesController');

    /*------------EMPRESAS----------------*/
    Route::resource('empresas', 'Adm\EmpresasController');

    /*------------REDES----------------*/
    Route::resource('redes', 'Adm\RedesController');

    /*------------SLIDERS----------------*/
    Route::resource('sliders', 'Adm\SlidersController');

    /*------------USERS----------------*/
    Route::resource('users', 'Adm\UsersController');

    /*------------DISTRIBUIDORES----------------*/
    Route::resource('distribuidores', 'Adm\DistribuidoresController');

    /*------------METADATOS----------------*/
    Route::resource('metadatos', 'Adm\MetadatosController');
    
});