<?php

namespace App\Http\Controllers;

use App\Models\prime;
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

    public function showForm(Request $request){
        $visiteur = visiteur::find($request->segment(4));
        return view('formAddPrime',['visiteur' => $visiteur]);
    }



    public function storePrime(Request $request)
    {
        // Validation des données envoyées par le formulaire
        $validatedData = $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        $lastPrime= prime::max('idPrime');
        // Création d'une nouvelle transaction en utilisant les données validées
        $prime = new prime([
            'idPrime'=>$lastPrime+1,
            'datePrime' => $validatedData['date'],
            'montantPrime' => $validatedData['amount'],
            'descriptionPrime' => $validatedData['description'],
            'idVisiteur'=> $request->idVisiteur
        ]);

        // Enregistrement de la transaction dans la base de données
        $prime->save();


        $segments=explode('/',url()->current());
        array_pop($segments);
        $url=implode('/',$segments);
        // Redirection vers la page de confirmation ou la liste des transactions
        return redirect($url)->with('success', 'Transaction enregistrée avec succès.');
    }

}
