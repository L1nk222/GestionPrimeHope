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
                @isset(auth()->user()->visiteur)
                <div class="card-header">
                    <div>Prime de: {{auth()->user()->visiteur->nomVisiteur}}</div>
                    <div>Région: {{auth()->user()->visiteur->region->libelleRegion}}</div>
                </div>


               <table>
               @isset($primes)
               <tr>
                <th>Id de la prime</th>
                <th>Date de la prime</th>
                <th>Description de la prime</th>
                <th>Montant de la prime</th>
               </tr>
                    @foreach ($primes as $prime)
                        <tr>
                            <td>{{$prime->idPrime}}</td>
                            <td>{{$prime->datePrime}}</td>
                            <td>{{$prime->descriptionPrime}}</td>
                            <td>{{$prime->montantPrime}}</td>
                        </tr>
                    @endforeach
                @endisset
            </table>
            @endisset
            @empty(auth()->user()->visiteur)
            <a href="{{url()->previous()}}" class="btn btn-secondary">Vous vous étes perdu appuyer ici pour revenir en lieu sur </a>
            @endempty
            </div>
        </div>
    </div>
</div>
@endsection
