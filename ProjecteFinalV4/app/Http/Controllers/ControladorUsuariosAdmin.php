<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelUsuarios;
use App\Models\modelProductos;
use App\Models\modelCategoria;
use App\Models\modelCarrito;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ControladorUsuariosAdmin extends Controller
{
    // Mostrar formulario de editar perfil   
    public function mostrarEditarPerfil()
    {
    $usuario = auth()->user(); // O cualquier lógica para obtener el usuario autenticado

    return view('editarPerfil', compact('usuario'));
    }
    // Devolver la vista Registrar
    public function registerPage()
    {
        return view('Registrar'); 
    }
    // Devolver la vista IniciarSesion
    public function loginPage()
    {
        return view('IniciarSesion'); 
    }

    // Método para mostrar la VistaAdmin.
    public function vistaAdmin()
    {
        $productos = modelProductos::all();
        $usuarios = modelUsuarios::all();
        $categorias = modelCategoria::all();
        return view('VistaAdmin', compact('productos','usuarios','categorias')); 
    }

    // Método para mostrar la VistaUsuario.
    public function vistaUsuario()
    {
        $productos = modelProductos::all();
        $usuarios = modelUsuarios::all();
        $categorias = modelCategoria::all();
        $carrito = modelCarrito::all();
        return view('VistaUsuario', compact('productos','usuarios','categorias','carrito')); 
    }

    public function store(Request $request)
    {
    // Aquí puedes validar y almacenar los datos en la base de datos
    $request->validate([
        'nick' => 'required',
        'email' => 'required',
        'nombre' => 'required',
        'apellidos' => 'required',
        'contra' => 'required',
        'dni' => 'required',
        'fecha_nacimiento' => 'required|date',
        'rol' => 'required|in:admin,usuario',
    ]);
    // Crear un nuevo usuario utilizando los datos del formulario.
    $usuario = modelUsuarios::create($request->all());

       // Llamar a la función correspondiente según el rol
        if ($usuario->rol == 'admin') {
            return $this->vistaAdmin();
        } else {
            return $this->vistaUsuario();
        }

    }

    public function verificarUsuario(Request $request)
    {
        // Obtener los datos del formulario
        $email = $request->input('email');
        $contrasena = $request->input('contra');

        // Buscar al usuario en la base de datos
        $usuario = modelUsuarios::where('email', $email)->where('contra', $contrasena)->first();

        // Verificar si el usuario existe
        if ($usuario) {
            // Obtener el rol del usuario
            $rol = $usuario->rol;

            // Redireccionar según el rol del usuario
            if ($rol == 'admin') {
                $productos = modelProductos::all();
                $usuarios = modelUsuarios::all();
                $categorias = modelCategoria::all();
                $carrito = modelCarrito::all();
                return view('VistaAdmin', compact('productos','usuarios','categorias','carrito')); 
            } elseif ($rol == 'usuario') {
                $productos = modelProductos::all();
                $usuarios = modelUsuarios::all();
                $categorias = modelCategoria::all();
                $carrito = modelCarrito::all();
                return view('VistaUsuario', compact('productos','usuarios','categorias','carrito')); 
            } 
        } else {
            return view('IniciarSesion')->with('Error');
        }
    }

    public function actualizar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nick' => 'required',
            'email' => 'required',
        ]);

        // Obtener el usuario autenticado
        $usuario = Auth::user();

        // Actualizar el nick y el correo electrónico del usuario
        $usuario->update([
            'nick' => $request->input('nick'),
            'email' => $request->input('email'),
        ]);

        // Redirigir a la vista de perfil o a donde sea apropiado después de la actualización
        $productos = modelProductos::all();
        $usuarios = modelUsuarios::all();
        $categorias = modelCategoria::all();
        $carritos = modelCarrito::all();
        return view('VistaUsuario', compact('productos','usuarios','categorias','carritos')); 
    }


    //FUNCIONES DE ADMIN
    // Método para mostrar el formulario de edición de un usuario específico.
    public function editar(modelUsuarios $usuario)
    {
        return view('editarUsuarios', ['usuario' => $usuario]);
    }

    // Método para eliminar un usuario específic de la base de datos.
    public function destroy($id)
    {
        $usuario = modelUsuarios::findOrFail($id); // Obtener el usuario a eliminar por su ID.
        $usuario->delete(); // Eliminar el usuario de la base de datos.

        $productos = modelProductos::all();
        $usuarios = modelUsuarios::all();
        $categorias = modelCategoria::all();
        return view('VistaAdmin', compact('productos','usuarios','categorias')); 
    }

    public function storeAdmin(Request $request)
    {
    // Aquí puedes validar y almacenar los datos en la base de datos
    $request->validate([
        'nick' => 'required',
        'email' => 'required',
        'nombre' => 'required',
        'contra' => 'required',
        'dni' => 'required',
        'fecha_nacimiento' => 'required|date',
        'rol' => 'required|in:admin,usuario',
    ]);
    // Crear un nuevo usuario utilizando los datos del formulario.
    $usuario = modelUsuarios::create($request->all());

    $productos = modelProductos::all();
    $usuarios = modelUsuarios::all();
    $categorias = modelCategoria::all();
    return view('VistaAdmin', compact('productos','usuarios','categorias')); 

    }

    // Método para actualizar la información de un usuario específico en la base de datos.
    function update(Request $request, modelUsuarios $usuario)
    {
        $validados = $request->validate([
            'nick' => 'required',
            'email' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'contra' => 'required',
            'dni' => 'required',
            'fecha_nacimiento' => 'required',
            'rol' => ['required', 'in:admin,usuario'],
        ]);

        $usuario->update($validados); // Actualizar la información del usuario con los datos del formulario.

        // Y devuelve la vista con un mensaje
        return redirect()->route('VistaAdmin')->with('status', 'Usuario editado correctamente!');
    }
}