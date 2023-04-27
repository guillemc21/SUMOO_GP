<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

//Fecha y hora actuales
date_default_timezone_set("Europe/Madrid");

class ClearCartData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Verifica si el carrito de la compra está en la sesión
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');


            // Obtener la fecha y hora de la última actualización del carrito
            $lastUpdated = $cart['updated_at'];

            // Obtener la fecha y hora actual
            $now = now()->toDateTimeString();

            // Las convertimos a segundos
            $lastUpdatedC = \Carbon\Carbon::parse($lastUpdated);
            $nowC = \Carbon\Carbon::parse($now);

            
            // Calcular la diferencia de tiempo
            $timeDiff = $lastUpdatedC->diff($nowC);

            $timeDiffS = $timeDiff->format('%s');

            // Verifica si han pasado más de 30 minutos desde la última vez que se actualizó el carrito
            if ($timeDiffS>20) {
                // Vacía el carrito
                $request->session()->forget('cart');
                // $cart['created_at'] = now()->toDateTimeString();
                // $cart['updated_at'] = now()->toDateTimeString();
                
            }
        }

        return $response;
    }
}
