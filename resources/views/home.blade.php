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
            @isset($visiteurs)
            <a href="{{ url()->current()}}/add " class="button">ajouter un nouveau compte</a>
            @endisset
            <div class="card">
                @isset(Auth::user()->idVisiteur)

                @endisset

                <div class="card-header">
                    @isset($primes)
                    <a href="{{url()->current()}}/add">Nouvelle prime</a>
                    @endisset
                    @isset($primes)
                    <a href="{{ url(substr(request()->url(), 0, strrpos(request()->url(), '/'))) }}">Revenir en arrière</a>
                    @endisset
                    <form action="{{ url()->current() }}" method="GET">
                        <input type="text" name="term" placeholder="Rechercher...">
                        <button type="submit">Rechercher</button>
                    </form>



                </div>


                <table>
                @isset($regions)
                    @foreach ($regions as $region)
                        <tr>
                            <td>{{$region->idRegion}}</td>

                            <td>
                                {{$region->libelleRegion}}
                            </td>
                            <td>{{$region->nomDelegueRegion}}</td>
                                <td><a href="{{url()->current()}}/{{$region->idRegion}}">voir plus</a></td>

                        </tr>
                    @endforeach
                @endisset

                @isset($visiteurs)
                    @foreach($visiteurs as $visiteur)
                        <tr>
                            <td>
                                {{$visiteur->idVisiteur}}
                            </td>
                            <td>
                                {{$visiteur->nomVisiteur}}
                            </td>
                                <td><a href="{{url()->current()}}/{{$visiteur->idVisiteur}}">voir plus</a></td>

                        </tr>
                    @endforeach
                @endisset

                @isset($primes)
                    @foreach ($primes as $prime)
                        <tr>
                            <td>{{$prime->idPrime}}</td>
                            <td>{{$prime->datePrime}}</td>
                            <td>{{$prime->descriptionPrime}}</td>
                            <td>{{$prime->montantPrime}}</td>
                            <td><a href="{{url()->current()}}/{{$prime->idPrime}}">Modifier</a></td>
                        </tr>
                    @endforeach
                @endisset

                @isset($secteurs)
                    @foreach ($secteurs as $secteur)
                    <tr>
                        <td>{{$secteur->idSecteur}}</td>
                        <td>{{$secteur->libelleSecteur}}</td>
                        <td>{{$secteur->nomResponsable}}</td>
                        <td><a href="/home/{{$secteur->idSecteur}}">voir plus</a></td>
                    </tr>
                    @endforeach
                @endisset
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
