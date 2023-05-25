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
                ici les delegue
                <table>
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
                        </tr>
                    @endforeach
                @endisset


                </table>
            </div>
        </div>
    </div>
</div>
@endsection
