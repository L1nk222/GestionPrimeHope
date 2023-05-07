<?php

namespace App\Http\Controllers;

use App\Models\visiteur;
use App\Models\region;
use Illuminate\Http\Request;

class VisiteurController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     *
     * @param mixed $idRegion
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showAll(){
       // $region = region::find($idRegion);
        $visiteurs=visiteur::all();
        return view('visiteur',['visiteurs' => $visiteurs]);
    }
}
