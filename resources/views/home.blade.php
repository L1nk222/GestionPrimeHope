@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}

            <div class="card">
                @isset(Auth::user()->idVisiteur)

                @endisset

                <div class="card-header">
                    @isset($primes)
                    <a href="{{ url(substr(request()->url(), 0, strrpos(request()->url(), '/'))) }}" class="btn btn-secondary">Revenir en arrière</a>
                    <a href="{{url()->current()}}/add" class="btn btn-info ">Nouvelle prime</a>
                    <br>
                    <br>

                    @endisset

                    @isset($visiteurs)
                    <a href="{{ url()->current()}}/add " class="btn btn-info" >Ajouter un nouveau compte</a>
                    <br>
                    <br>
                    @endisset

                    <form action="{{ url()->current() }}" method="GET">
                        <input type="text" name="term" placeholder="Rechercher...">
                        <button type="submit">Rechercher</button>
                    </form>





                </div>


                <table>
                @isset($regions)
                <tr>
                    <th>Id de la région</th>
                    <th>Libellé de la région</th>
                    <th>Nom du délégué de la région</th>
                  </tr>
                    @foreach ($regions as $region)
                        <tr>
                            <td>{{$region->idRegion}}</td>

                            <td><a href="{{url()->current()}}/{{$region->idRegion}}">
                                {{$region->libelleRegion}}</a>
                            </td>
                            <td>{{$region->nomDelegueRegion}}</td>
                            {{-- <td><a href="{{url()->current()}}/{{$region->idRegion}}">voir plus</a></td> --}}

                        </tr>
                    @endforeach
                @endisset

                @isset($visiteurs)
                <tr>
                    <th>Id du visiteur</th>
                    <th>Nom du visiteur</th>
                  </tr>
                    @foreach($visiteurs as $visiteur)
                        <tr>
                            <td>
                                {{$visiteur->idVisiteur}}
                            </td>
                            <td>
                                <a href="{{url()->current()}}/{{$visiteur->idVisiteur}}">{{$visiteur->nomVisiteur}}</a>
                            </td>

                            <td><a href="{{url()->current()}}/{{$visiteur->idVisiteur}}/update" class="btn btn-success">Modifier</a></td>
                            <td><a href="{{url()->current()}}/{{$visiteur->idVisiteur}}/delete"  class="btn btn-danger">Supprimer</button></td>

                        </tr>
                    @endforeach
                @endisset

                @isset($primes)
                <tr>
                    <th>Id de la prime</th>
                    <th>Date de la prime</th>
                    <th>Description de la prime </th>
                    <th>Montant de la prime</th>
                  </tr>
                    @foreach ($primes as $prime)
                        <tr>
                            <td>{{$prime->idPrime}}</td>
                            <td>{{$prime->datePrime}}</td>
                            <td>{{$prime->descriptionPrime}}</td>
                            <td>{{$prime->montantPrime}}</td>
                            <td><a href="{{url()->current()}}/{{$prime->idPrime}}/update" class="btn btn-success">Modifier</a></td>
                            <td><a href="{{url()->current()}}/{{$prime->idPrime}}/delete"  class="btn btn-danger">Supprimer</button></td>
                        </tr>
                    @endforeach
                @endisset

                @isset($secteurs)
                <tr>
                    <th>Id du secteur</th>
                    <th>Libellé du secteur</th>
                    <th>Nom du responsable du secteur</th>
                  </tr>
                    @foreach ($secteurs as $secteur)

                    <tr>
                        <td>{{$secteur->idSecteur}}</td>
                        <td><a href="/home/{{$secteur->idSecteur}}">{{$secteur->libelleSecteur}}</a></td>

                        <td>{{$secteur->nomResponsable}}</td>
                        {{-- <td><a href="/home/{{$secteur->idSecteur}}">voir plus</a></td> --}}
                    </tr>
                    @endforeach
                @endisset
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
