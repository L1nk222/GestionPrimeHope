<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\secteur;
class SecteurController extends Controller
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
    public function showAll()
    {
        $secteurAll=secteur::all();
        return view('secteur',['secteurAll' => $secteurAll]);
    }

    public function show()
    {

    }


}

