@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @isset($visiteur)
                <a href="{{ url(substr(request()->url(), 0, strrpos(substr(request()->url(), 0, strrpos(request()->url(), '/')), '/'))) }}" class="btn btn-secondary">Revenir en arrière</a>
                @endisset
                @empty($visiteur)
                <a href="{{ url(substr(request()->url(), 0, strrpos(request()->url(), '/'))) }}" class="btn btn-secondary">Revenir en arrière</a>
                @endempty

                <div class="card-header">Nouvel utilisateur</div>

                <div class="card-body">

                    <form method="POST" action="" class="form">
                        @csrf

                       {{-- <input type="hidden" id="id" name="id" value="{{$id}}" > --}}

                        <div class="form-group">
                            <label for="name">Nom :</label>
                            <input type="text" id="name" name="name" class="form-control" @isset($visiteur) value="{{$visiteur->nomVisiteur}}"@endisset required>
                        </div>

                        <div class="form-group">
                            <label for="email">Adresse email :</label>
                            <input type="text" id="email" name="email" class="form-control  @error('email') is-invalid @enderror"@isset($user) value="{{$user->email}}" @endisset required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        {{-- <input type="hidden" id="idRegion" name="idRegion"value="{{$idRegion}}"> --}}
                        @isset($user)
                        <input type="hidden" id="id" name="id"value="{{$user->id}}">
                        @endisset
                        <br>
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
