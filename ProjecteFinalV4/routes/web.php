<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorProductoAdmin;
use App\Http\Controllers\ControladorCategoriasAdmin;
use App\Http\Controllers\ControladorUsuariosAdmin;


Route::resource('categorias', ControladorCategoriasAdmin::class);
Route::resource('productos', ControladorProductoAdmin::class);
Route::resource('usuarios', ControladorUsuariosAdmin::class);

Route::get('/', function () {
    return view('Index');
});

Route::view('/VistaAdmin', 'VistaAdmin')->name('VistaAdmin');
Route::view('/VistaUsuario', 'VistaUsuario')->name('VistaUsuario');

/*Registrar*/ 
Route::get('/Registrar',[ControladorUsuariosAdmin::class,'registerPage'])
->name('usuarios.registerPage');
/*Iniciar Sesion*/ 
Route::get('/IniciarSesion',[ControladorUsuariosAdmin::class,'loginPage'])
->name('usuarios.loginPage');


/*Rutas funciones*/
/*Iniciar Sesion*/
Route::post('/usuarios/verificarUsuario', [ControladorUsuariosAdmin::class, 'verificarUsuario'])->name('usuarios.verificarUsuario');
/*Vista Admin*/ 
Route::view('/r', 'Index')->name('volver');
Route::view('/admin', 'VistaAdmin')->name('VistaAdmin');

//editar usuario VistaUsuario, editar usuario VistaAdmin,filtro.

    // Coloca aquí tus rutas para usuarios normales
    /*Vista Usuario*/
    Route::get('/filtro-productos','ControladorProductoAdmin@filtroCategoria')->name('productos.filtroCategoria');
    Route::post('/carrito/agregar/{id}', 'CarritoController@agregar')->name('carrito.agregar');/*Hacer cambio*/ 
    Route::middleware(['auth'])->group(function () {
    Route::put('/usuarios/actualizar', [ControladorUsuariosAdmin::class, 'actualizar'])->name('usuarios.actualizar');
    });

    /*Funciones VistaUsuario*/
    Route::post('/productos/{producto}/añadir', [ControladorProductoAdmin::class, 'agregarCarrito'])->name('productos.agregarCarrito');
    Route::delete('/carrito/{carrito}/destroy', [ControladorProductoAdmin::class, 'quitarCarrito'])->name('productos.quitarCarrito');

    Route::get('/productos/filtroCategoria', [ControladorProductoAdmin::class, 'filtroCategoria'])->name('productos.filtroCategoria');
    Route::get('/productos/ordenarPorPrecio', [ControladorProductoAdmin::class, 'ordenarPorPrecio'])->name('productos.ordenarPorPrecio');

    /*Route::get('/usuarios/editar-perfil', [ControladorUsuariosAdmin::class, 'mostrarEditarPerfil'])->name('usuarios.mostrarEditarPerfil');*/
    Route::post('/usuarios/editar-perfil', 'ControladorUsuariosAdmin@mostrarEditarPerfil')->name('usuarios.mostrarEditarPerfil');
    Route::post('/usuarios/actualizar-perfil', [ControladorUsuariosAdmin::class, 'actualizar'])->name('usuarios.actualizar');


    // Coloca aquí tus rutas para administradores
    Route::view('/crear-Productos', 'crearProductos')->name('crearProductos');
    Route::view('/crear-Usuarios', 'crearUsuarios')->name('crearUsuarios');
    Route::view('/crear-Categorias', 'crearCategorias')->name('crearCategorias');
    /*Vista Admin*/ 
    Route::get('/productos/{producto}/editar', [ControladorProductoAdmin::class,'editar'])->name('productos.editar');
    Route::get('/productos/{producto}/update', [ControladorProductoAdmin::class,'update'])->name('productos.update');

    Route::get('/usuarios/{usuario}/editar', [ControladorUsuariosAdmin::class,'editar'])->name('usuarios.editar');
    Route::put('/usuarios/{usuario}/update', [ControladorUsuariosAdmin::class,'update'])->name('usuarios.update');

    Route::get('/categorias/{categoria}/editar', [ControladorCategoriasAdmin::class,'editar'])->name('categorias.editar');

    Route::delete('/productos/{id}', 'ControladorProductoAdmin@destroy')->name('productos.destroy');
    Route::delete('/usuarios/{id}', 'ControladorUsuariosAdmin@destroy')->name('usuarios.destroy');
    Route::delete('/categorias/{id}', 'ControladorCategoriasAdmin@destroy')->name('categorias.destroy');

    Route::post('/guardar_producto',[ControladorProductoAdmin::class,'guardarProducto'])->name('productos.guardarProducto');
    Route::post('/guardar_usuario',[ControladorUsuariosAdmin::class,'storeAdmin'])->name('usuarios.storeAdmin');
    Route::post('/guardar_categoria',[ControladorCategoriasAdmin::class,'crearCategoria'])->name('categorias.crearCategoria');