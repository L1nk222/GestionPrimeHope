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

                @foreach ($secteurAll as $secteur)
          <tr>
            <td>{{$secteur->idSecteur}}</td>
            {{-- <td><a href="/secteur/{{$secteur->idSecteur}}">{{$secteur->libelleSecteur}}</a></td> --}}

            <td>{{$secteur->libelleSecteur}}</td>
          </tr>
          @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
