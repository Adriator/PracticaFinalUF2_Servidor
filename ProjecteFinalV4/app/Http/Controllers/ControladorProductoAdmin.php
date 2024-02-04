<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelCategoria;
use App\Models\modelProductos;
use App\Models\modelCarrito;
use App\Models\modelUsuarios;
use Illuminate\Support\Facades\DB;

class ControladorProductoAdmin extends Controller
{
 
    // Método para mostrar todos los productos en otra vista (ver).
    public function show(Request $request)
    {
        $orden = $request->input('orden', 'asc'); // Por defecto, orden ascendente si no se especifica

        // Lógica para ordenar por precio
        $productos = modelProductos::orderBy('precio_unitario', $orden)->get();
        // Retornar la vista con los productos y categorías
        $productos = modelProductos::all();
        $usuarios = modelUsuarios::all();
        $categorias = modelCategoria::all();
        $carrito = modelCarrito::all();
        return view('VistaUsuario', compact('productos','usuarios','categorias','carritos'));
    }

    // Método para actualizar la información de un producto específico en la base de datos.
    public function update(Request $request,modelProductos $producto)
    {
        $validados = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'unidades' => 'required|numeric',
            'precio_unitario' => 'required|numeric',
            'categoria' => 'required',
        ]);

        $producto->update($validados); // Actualizar la información del producto con los datos del formulario.

        // Y devuelve la vista con un mensaje
        $productos = modelProductos::all();
        $usuarios = modelUsuarios::all();  
        $categorias = modelCategoria::all();
        return view('VistaAdmin', compact('productos','usuarios','categorias'))->with('status', 'Producto editado correctamente!');
    }

    public function filtroCategoria(Request $request)
    {
        // Obtener los parámetros del formulario
        $categoriaId = $request->input('categoria');

        // Lógica para filtrar por categoría
        $productos = Producto::when($categoriaId, function ($query) use ($categoriaId) {
        return $query->where('categoria_id', $categoriaId);
        })->get();

        // Retornar la vista con los productos y categorías
        $productos = modelProductos::all();
        $usuarios = modelUsuarios::all();
        $categorias = modelCategoria::all();
        $carrito = modelCarrito::all();
        return view('VistaUsuario', compact('productos','usuarios','categorias','carritos'));
    }

    public function ordenarPorPrecio(Request $request)
    {
    $orden = $request->input('orden', 'asc'); // Por defecto, orden ascendente si no se especifica

    // Lógica para ordenar por precio
    $productos = Producto::orderBy('precio_unitario', $orden)->get();

    // Otros procesos o retornar la vista con los productos ordenados
    $productos = modelProductos::all();
    $usuarios = modelUsuarios::all();
    $categorias = modelCategoria::all();
    $carrito = modelCarrito::all();
    return view('VistaUsuario', compact('productos','usuarios','categorias','carritos'));
    }

    public function agregarCarrito(Request $request,modelProductos $producto)/*Modificar lo necessario*/ 
    {

        // Comprueba que los datos sean correctos y no sea mayor al stock disponible
        $request->validate([
            'cantidad' => ['required', 'numeric', 'max:' . $producto->unidades, 'min:1'],
        ]);

        // Hace el insert
        modelCarrito::create([
            'producto' => $producto->id,
            'cantidad' => $request->cantidad,
            'precio_producto' => $producto->precio_unitario,
            'total' => ($request->cantidad * $producto->precio_unitario),
        ]);

        // Hace un update del stock del producto
        $producto->update([
            'unidades' => ($producto->unidades - $request->cantidad)
        ]);

        // Devuelve a la ruta con el mensaje
                $productos = modelProductos::all();
                $usuarios = modelUsuarios::all();
                $categorias = modelCategoria::all();
                $carrito = modelCarrito::all();
                return view('VistaUsuario', compact('productos','usuarios','categorias','carrito')); 
        }

    public function quitarCarrito(Request $request,modelCarrito $carrito)
    {

        // Elimina el producto del carrito
        $carrito->delete();

        // Busca el id del producto
        $producto = modelProductos::findOrFail($carrito->producto);

        // Y le suma el stock
        $producto->update([
            'unidades' => ($producto->unidades + $carrito->cantidad)
        ]);

        // Devuelve a la ruta
                $productos = modelProductos::all();
                $usuarios = modelUsuarios::all();
                $categorias = modelCategoria::all();
                $carrito = modelCarrito::all();
                return view('VistaUsuario', compact('productos','usuarios','categorias','carrito'));
    }


    //FUNCIONES DE ADMIN
    // Método para mostrar el formulario de edición de un producto específico.
    public function editar(modelProductos $producto)
    {
        return view('editarProductos', ['producto' => $producto]);
    }

    // Método para eliminar un producto específico de la base de datos.
    public function destroy($id)
    {
        $productos = modelProductos::findOrFail($id); // Obtener el producto a eliminar por su ID.
        $productos->delete(); // Eliminar el producto de la base de datos.

        $productos = modelProductos::all();
        $usuarios = modelUsuarios::all();
        $categorias = modelCategoria::all();
        return view('VistaAdmin', compact('productos','usuarios','categorias')); 
    }

    // Método para almacenar un nuevo producto en la base de datos.
    public function guardarProducto(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'unidades' => 'required|numeric',
            'precio_unitario' => 'required|numeric',
            'categoria' => 'required',
        ]);

        modelProductos::create($request->all()); // Crear un nuevo producto utilizando los datos del formulario.

        $productos = modelProductos::all();
        $usuarios = modelUsuarios::all();
        $categorias = modelCategoria::all();
        return view('VistaAdmin', compact('productos','usuarios','categorias')); 
    }
}
