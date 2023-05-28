@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{ url(substr(request()->url(), 0, strrpos(request()->url(), '/'))) }}">Revenir en arrière</a>
                <div class="card-header">Nouvel utilisateur</div>

                <div class="card-body">

                    <form method="POST" action="" class="form">
                        @csrf

                       {{-- <input type="hidden" id="id" name="id" value="{{$id}}" > --}}

                        <div class="form-group">
                            <label for="name">Nom :</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Adresse email :</label>
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        {{-- <input type="hidden" id="idRegion" name="idRegion"value="{{$idRegion}}"> --}}

                        {{-- <input type="hidden" id="idVisiteur" name="idVisiteur"value="{{$idVisiteur}}"> --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>

                    </form>

                </div>
            </div>
            <div class="card">


            </div>
        </div>
    </div>
</div>
@endsection
