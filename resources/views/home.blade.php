@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="card">
                <table>
                @isset($regions)
                    @foreach ($regions as $region)
                        <tr>
                            <td>
                                {{$region->libelleRegion}}
                                <td><a href="{{url()->current()}}/{{$region->idRegion}}">voir plus</a></td>
                            </td>
                        </tr>
                    @endforeach
                @endisset

                @isset($visiteurs)
                    @foreach($visiteurs as $visiteur)
                        <tr>
                            <td>
                                {{$visiteur->nomVisiteur}}
                                <td><a href="{{url()->current()}}/{{$visiteur->idVisiteur}}">voir plus</a></td>
                            </td>
                        </tr>
                    @endforeach
                @endisset

                @isset($primes)
                    @foreach ($primes as $prime)
                        <tr>
                            <td>{{$prime->montantPrime}}</td>
                        </tr>
                    @endforeach
                @endisset

                @isset($secteurs)
                    @foreach ($secteurs as $secteur)
                    <tr>
                        <td>{{$secteur->libelleSecteur}}</td>
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