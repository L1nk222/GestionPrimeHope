@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Prime pour: {{$visiteur->nomVisiteur }}</div>

                <div class="card-body">

                    <form method="POST" action="" class="form">
                        @csrf

                        <div class="form-group">
                            <label for="date">Date :</label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="amount">Montant :</label>
                            <input type="number" id="amount" name="amount" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
                        </div>

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
