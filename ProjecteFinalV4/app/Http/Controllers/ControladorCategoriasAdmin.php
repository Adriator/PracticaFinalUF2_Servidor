<?php

namespace App\Http\Controllers;
use App\Models\modelCategoria;
use App\Models\modelProductos;
use App\Models\modelUsuarios;

use Illuminate\Http\Request;

class ControladorCategoriasAdmin extends Controller
{

    // Método para actualizar la información de una categoria específica en la base de datos.
    public function update(Request $request, modelCategoria $categoria)
    {
        $validados = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        $categoria->update($validados); // Actualizar la información de la categoria con los datos del formulario.
        // Y devuelve la vista con un mensaje
        $productos = modelProductos::all();
        $usuarios = modelUsuarios::all();
        $categorias = modelCategoria::all();
        return view('VistaAdmin', compact('productos','usuarios','categorias'))->with('status', 'Usuario editado correctamente!');
    }


    //FUNCIONES DE ADMIN

    // Método para mostrar el formulario de edición de una categoria específica.
    public function editar(modelCategoria $categoria)
    {
        return view('editarCategorias', ['categoria' => $categoria]); // Renderizar la vista 'editarCategorias' y pasar la información de la categoria.
    }

    // Método para eliminar una categoria específica de la base de datos.
    public function destroy($id)
    {
        $categorias = modelCategoria::findOrFail($id); // Obtener la categoria a eliminar por su ID.
        $categorias->delete(); // Eliminar la categoria de la base de datos.

        $productos = modelProductos::all();
        $usuarios = modelUsuarios::all();
        $categorias = modelCategoria::all();
        return view('VistaAdmin', compact('productos','usuarios','categorias')); 
    }

    // Método para almacenar una nueva categoria en la base de datos.
    public function crearCategoria(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);

        modelCategoria::create($request->all()); // Crear una nueva categoria utilizando los datos del formulario.

        $productos = modelProductos::all();
        $usuarios = modelUsuarios::all();
        $categorias = modelCategoria::all();
        return view('VistaAdmin', compact('productos','usuarios','categorias')); 
    }
}
