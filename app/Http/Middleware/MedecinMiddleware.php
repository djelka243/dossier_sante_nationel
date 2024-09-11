<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MedecinMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd('cc');
          // Vérifie si l'utilisateur est connecté
          if (!Auth::guard('medecin')->check()) {
            return redirect()->route('medecin.auth');
        }

        // // Vérifie si l'utilisateur est un administrateur
        // if (!auth::User()->isAdmin()) {
        //     abort(403, 'Vous n\'êtes pas autorisé à poursuivre.');
        // }

        return $next($request);
    }

   
}
