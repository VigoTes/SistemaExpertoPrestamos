<?php

namespace App\Http\Middleware;

use App\Usuario;
use Closure;

class ValidarSesion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Usuario::getUsuarioLogeado()){
            return redirect()->route('user.verLogin');
        }
        
        return $next($request);
    }
}
