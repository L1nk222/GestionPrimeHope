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
                Nom du visiteur:{{auth()->user()->visiteur->nomVisiteur}}
                <br>
                Region:{{auth()->user()->visiteur->region->libelleRegion}}
                <br>
               ceci sera la page des prime du visiteur qui se connecte
               <br>
               <table>
               @isset($primes)
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
            </div>
        </div>
    </div>
</div>
@endsection
