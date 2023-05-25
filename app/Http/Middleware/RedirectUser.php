<?php

namespace App\Http\Middleware;

use Closure;

class RedirectUser
{
    public function handle($request, Closure $next)
    {
        // Vérifiez si l'utilisateur est du type spécifique

        $secteur=$request->route('secteur');
        $region=$request->route('region');



        if(auth()->check() && isset(auth()->user()->idSecteur)) {
            if(preg_match('/^'.auth()->user()->idSecteur.'/',$secteur))
            {
                return  $next($request);
            }
            return redirect()->route('home',auth()->user()->idSecteur);

        }
        if(auth()->check() && isset(auth()->user()->idRegion)) {
            $secteur=auth()->user()->region->idSecteur;
             if(preg_match('/^['.$secteur.auth()->user()->idRegion.']/',$region))
             {
                return  $next($request);
            }
            return redirect()->route('home',[$secteur,auth()->user()->idRegion]);

        }



        if (auth()->check() && isset(auth()->user()->idVisiteur) ) {
            return redirect()->route('VisiteurPrime');
            //return $next($request);
        }

        // if (auth()->check() && isset(auth()->user()->idSecteur) ) {
        //     return redirect()->route('VisiteurPrime');
        //     //return $next($request);
        // }


        // Redirigez l'utilisateur vers une autre page s'il n'est pas du type spécifique
        //return redirect()->route('home');
        return $next($request);
    }
}
