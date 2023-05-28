<?php

namespace App\Http\Controllers;

use App\Models\prime;
use App\Models\visiteur;
use App\Models\region;
use App\Models\User;
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

    public function showVisiteurPrime(){
        $visiteur=auth()->user()->visiteur;
        $primes=prime::where('idVisiteur',$visiteur->idVisiteur)->get();
        return view('visiteurPrime',['primes' => $primes]);
    }

    public function updatePrimeForm(Request $request){
        $visiteur = visiteur::find($request->segment(4));
        $prime = prime::find($request->segment(5));
        return view('formAddPrime',['visiteur' => $visiteur,'prime'=> $prime]);

    }

    public function updatePrimeStore(Request $request){
        $validatedData = $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        $prime=prime::find($request->idPrime);

            $prime->idPrime=$request->idPrime;
            $prime->datePrime =$validatedData['date'];
            $prime->montantPrime = $validatedData['amount'];
            $prime->descriptionPrime = $validatedData['description'];
            $prime->idVisiteur= $request->idVisiteur;

        // Enregistrement de la transaction dans la base de données
        $prime->save();


        $segments=explode('/',url()->current());
        array_pop($segments);
        array_pop($segments);
        $url=implode('/',$segments);
        // Redirection vers la page de confirmation ou la liste des transactions
        return redirect($url)->with('success', 'Transaction enregistrée avec succès.');

    }

    public function showFormDeletePrime(){
        return view('formDeletePrime');
    }

    public function DeletePrime(Request $request){

        $prime=prime::find($request->idPrime);
        $prime->delete();

        $segments=explode('/',url()->current());
        array_pop($segments);
        array_pop($segments);
        $url=implode('/',$segments);
        // Redirection vers la page de confirmation ou la liste des transactions
        return redirect($url)->with('success', 'Transaction enregistrée avec succès.');
    }

}
