<?php

namespace App\Http\Controllers;

use App\Models\visiteur;
use Illuminate\Http\Request;
use App\Models\region;
use App\Models\secteur;
use App\Models\prime;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request)
    {
        if($request->segment(2)){


            if($request->segment(3)){

                if($request->segment(4)){

                    $visiteur = visiteur::find($request->segment(4));
                    $primes=prime::where('idVisiteur',$visiteur->idVisiteur)->get();
                    return view('home',['primes' => $primes]);
                }

                $region = region::find($request->segment(3));
                $visiteurs=visiteur::where('idRegion',$region->idRegion)->get();
                return view('home',['visiteurs' => $visiteurs]);
            }


            $secteur = secteur::find($request->segment(2));
            $regions=region::where('idSecteur',$secteur->idSecteur)->get();
            return view('home',['regions' => $regions]);
    }
    $secteurs=secteur::all();
    return view('home',['secteurs'=>$secteurs]);
}


}

