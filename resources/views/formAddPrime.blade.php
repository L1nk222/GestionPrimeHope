@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{ url(substr(request()->url(), 0, strrpos(request()->url(), '/'))) }}">Revenir en arrière</a>
                <div class="card-header">Prime pour: {{$visiteur->nomVisiteur }}</div>

                <div class="card-body">

                    <form method="POST" action="" class="form">
                        @csrf

                        <div class="form-group">
                            <label for="date">Date :</label>
                            <input type="date" id="date" name="date" class="form-control" @isset($prime) value="{{$prime->datePrime}}"@endisset required>
                        </div>

                        <div class="form-group">
                            <label for="amount">Montant :</label>
                            <input type="number" id="amount" name="amount" class="form-control" @isset($prime) value="{{$prime->montantPrime}}"@endisset required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea id="description" name="description"  class="form-control" rows="5" required>@isset($prime){{$prime->descriptionPrime}}@endisset</textarea>
                        </div>

                        @isset($prime)
                        <input type="hidden" id="idPrime" name="idPrime"value="{{$prime->idPrime}}">
                        @endisset
                        <input type="hidden" id="idVisiteur" name="idVisiteur"value="{{$visiteur->idVisiteur}}">
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
