<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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

            // Verifica si han pasado más de 30 minutos desde la última vez que se actualizó el carrito
            if (isset($cart['updated_at']) && time() - $cart['updated_at'] >= 1800) {
                // Vacía el carrito
                $request->session()->forget('cart');
            }
        }

        return $response;
    }
}
