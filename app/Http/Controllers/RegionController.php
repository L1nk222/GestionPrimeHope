<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\region;
use App\Models\visiteur;
use App\Models\User;



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

    public function showFormNewUser(Request $request){
        // $id= User::max('id')+1;
        // $idVisiteur=visiteur::max('idVisiteur')+1;
        // $idRegion=$request->segment(3);
        return view('formAddUser');
    }

    public function StoreUser(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $id= User::max('id')+1;
        $idVisiteur=visiteur::max('idVisiteur')+1;
        $idRegion=$request->segment(3);

        $user= new User([
            'id'=>$id,
            'name'=>$validatedData['name'],
            'email'=>$validatedData['email'],
            'password'=>bcrypt($validatedData['password']),
            'idVisiteur'=>$idVisiteur
        ]);


        $visiteur= new visiteur([
            'idVisiteur'=>$idVisiteur,
            'nomVisiteur'=>$validatedData['name'],
            'idRegion'=>$idRegion

        ]);

        $visiteur->save();
        $user->save();

        $segments=explode('/',url()->current());
        array_pop($segments);
        $url=implode('/',$segments);
        // Redirection vers la page de confirmation ou la liste des transactions
        return redirect($url)->with('success', 'Transaction enregistrée avec succès.');

    }

    public function showFormUpdateUser(Request $request){

        $visiteur = visiteur::find($request->segment(4));
        $user=User::find($visiteur->user->id);
        $region = region::find($request->segment(3));
        return view('formAddUser',['visiteur'=>$visiteur,'region'=>$region,'user'=>$user]);
    }

    public function StoreUpdateUser(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user=User::find($request->id);
        $visiteur=visiteur::find($request->segment(4));


        $user->name=$validatedData['name'];
        $user->email=$validatedData['email'];
        $user->password=bcrypt($validatedData['password']);
        $visiteur->nomVisiteur=$validatedData['name'];

        $visiteur->save();
        $user->save();

        $segments=explode('/',url()->current());
        array_pop($segments);
        array_pop($segments);
        $url=implode('/',$segments);
        // Redirection vers la page de confirmation ou la liste des transactions
        return redirect($url)->with('success', 'Transaction enregistrée avec succès.');


    }


}
