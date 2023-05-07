<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\region;
use App\Models\secteur;

class RegionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Summary of show
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id){
        $region = region::find();
        return view('');
    }

    public function showAll(){
        $regionAll=region::all();
        return view('region',['regionAll' => $regionAll]);;
    }

    public function findIdSecteur(){

    }
}
