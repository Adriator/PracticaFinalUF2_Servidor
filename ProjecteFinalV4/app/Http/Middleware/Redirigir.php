<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Redirigir
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si se ha enviado el formulario
        if ($request->has('modo')) {
            // Obtener el modo seleccionado
          $modo = $request->input('modo');
  
          // Redirigir según el modo seleccionado
          if ($modo === 'registrar') {
              return redirect('/Registrar');
          } elseif ($modo === 'iniciar_sesion') {
              return redirect('/IniciarSesion');
          }  
          }
  
          // Si no se ha enviado el formulario, mostrar la página de selección de modo
          return $next($request);
    }
}