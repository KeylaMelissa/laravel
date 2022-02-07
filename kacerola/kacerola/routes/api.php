<?php

use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::resource('seg_usuarios','Usuario\UsuarioController',['only' => ['show','store']]);
Route::post('seg_usuarios', 'Usuario\UsuarioController@register')->name('register');



//CONTROLADOR PARAMETRO
//Route::resource('cfg_parametros','Parametro\ParametroController',['only' => ['show']]);
// SHOW
Route::get('/parametros/{id}', 'Parametro\ParametroController@parametros')->name('parametros');


// CONTROLADORES DE UBIGEO
//AUTOCOMPLETE UBIGEO

Route::post('/mae_pais/getPaises', 'Ubigeo\Pais\PaisController@getPaises')->name('mae_pais.getPaises');

Route::get('/ubigeo/autocomplete/departamento/{term}', 'Ubigeo\Departamento\DepartamentoController@autocompletadoDepartamento')->name('ubigeo.autocomplete.autocompletadoDepartamento');

Route::get('/ubigeo/autocomplete/provincia/{term}/{idDepartamento}', 'Ubigeo\Provincia\ProvinciaController@autocompletadoProvincia')->name('ubigeo.autocomplete.autocompletadoProvincia');

Route::get('/ubigeo/autocomplete/distrito/{term}/{idProvincia}', 'Ubigeo\Distrito\DistritoController@autocompletadoDistrito')->name('ubigeo.autocomplete.autocompletadoDistrito');


// CONTROLADOR DE TABLA AUXILIAR

// AUTOCOMPLETE 
Route::post('/tabla_auxiliar_detalle/autocomplete', 'TablaAuxiliarDetalle\TablaAuxiliarDetalleController@autocompletado')->name('tabla_auxiliar_detalle.autocompletado');
// SHOW
Route::post('/tabla_auxiliar_detalle', 'TablaAuxiliarDetalle\TablaAuxiliarDetalleController@show')->name('show');
//COMBOBOX
Route::post('/tabla_auxiliar_detalle/combo_box', 'TablaAuxiliarDetalle\TablaAuxiliarDetalleController@comboBox')->name('tabla_auxiliar_detalle.comboBox');


// CONTROLADOR DE HORARIOATENCION
// LISTA
Route::get('/horario_atencion/listado', 'HorarioAtencion\HorarioAtencionController@listado')->name('listado');


// CONTROLADOR DE BLOG
//Route::resource('blg_entrada_blogs','Blog\BlogController',['only' => ['show']]);
//CREATE
Route::post('/entrada_blog', 'Blog\BlogController@create')->name('create');
//
Route::get('/entrada_blog/foto/{foto}', 'Blog\BlogController@verFoto')->name('verFoto');
//TOP listado
Route::get('/entrada_blog/listado_top', 'Blog\BlogController@topListadoCategoria')->name('topListadoCategoria');
//TOP listado
Route::get('/entrada_blog/listado_populares', 'Blog\BlogController@topListadoPopulares')->name('topListadoPopulares');
//LISTADO
Route::get('/entrada_blog/listado', 'Blog\BlogController@listado')->name('listado');
//LISTADO CATEGORIA
Route::get('/entrada_blog/categoria/listado', 'Blog\BlogController@listadoCategoria')->name('listadoCategoria');
//SHOWCATEGORIA
Route::get('/entrada_blog/categoria/{id?}', 'Blog\BlogController@showCategoria')->name('showCategoria');
//SHOW
Route::get('/entrada_blog/{id?}', 'Blog\BlogController@show')->name('show');


// CONTROLADOR CLIENTE
//Route::resource('mae_clientes','Cliente\ClienteController',['only' => ['show','store']]);
Route::get('/cliente/{id?}', 'Cliente\ClienteController@show')->name('show');
//CREATE
Route::post('/cliente', 'Cliente\ClienteController@create')->name('create');

// CONTROLADOR EMPRESA
//Route::resource('mae_empresas','Empresa\EmpresaController',['only' => ['show','store']]);
Route::get('/empresa/{id}', 'Empresa\EmpresaController@show')->name('show');
Route::get('/empresa/foto/{foto}', 'Empresa\EmpresaController@verFoto')->name('verFoto');


// CONTROLADOR ENVIOMENSAJE
Route::post('/envio_mensaje', 'EnvioMensaje\EnvioMensajeController@create')->name('create');

// CONTROLADOR FOTOWEB
Route::get('/foto_web/{id?}', 'FotoWeb\FotoWebController@show')->name('show');
Route::get('/foto_web/foto/{foto}', 'FotoWeb\FotoWebController@verFoto')->name('verFoto');

// CONTROLADOR CATEGORIAPRODUCTO
//Route::resource('mae_categoria_productos','CategoriaProducto\CategoriaProductoController',['only' => ['show','store']]); 
//LISTADO
Route::get('/categoria_producto/listado', 'CategoriaProducto\CategoriaProductoController@listado')->name('listado');
//SHOW
Route::get('/categoria_producto/{id?}', 'CategoriaProducto\CategoriaProductoController@show')->name('show');
//CREATE
Route::post('/categoria_producto', 'CategoriaProducto\CategoriaProductoController@create')->name('create');
//VER FOTO
Route::get('/categoria_producto/foto/{fotoPortada}', 'CategoriaProducto\CategoriaProductoController@verFoto')->name('verFoto');


//CONTROLADOR PRODUCTO
//LISTADO
Route::get('/producto/listado', 'Producto\ProductoController@listado')->name('listado');
//FALTAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
Route::get('/producto/populares', 'Producto\ProductoController@topPopulares')->name('topPopulares');
//TOP RECOMENDADOS
Route::get('/producto/recomendados', 'Producto\ProductoController@topRecomendados')->name('topRecomendados');
//SHOW
Route::get('/producto/{id?}', 'Producto\ProductoController@show')->name('show');
//CREATE
Route::post('/producto', 'Producto\ProductoController@create')->name('create');
//VER FOTO
Route::get('/producto/foto/{foto}', 'Producto\ProductoController@verFoto')->name('verFoto');


//CONTROLADOR CARROCOMPRA
//SHOW
Route::get('/carro_compra/{id}', 'CarroCompra\CarroCompraController@show')->name('show');
//CREATE
Route::post('/carro_compra', 'CarroCompra\CarroCompraController@create')->name('create');
//UPDATE
Route::put('/carro_compra/{id}', 'CarroCompra\CarroCompraController@update')->name('update');





