<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role='administrador')
    {
        //evaluar si el usuario esta autenticado
        //el check devuelve un booleano
        if(!auth()->check()){
            abort(403);

        }
        //algo asi va a ser el parametro
        //$role='administrador-paciente-medico';

        $roles=explode('-',$role);
        //evaluar si el usuario tiene un determinado rol
        if($request->user()->has_any_role($roles)){
            return $next($request);


        }else{
            abort(403);
        }


    }
}
