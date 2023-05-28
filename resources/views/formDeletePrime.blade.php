@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <a href="{{ url(substr(request()->url(), 0, strrpos(substr(request()->url(), 0, strrpos(request()->url(), '/')), '/'))) }}" class="btn btn-secondary">Revenir en arrière</a>


                <div class="card-body">

                    <form method="POST" action="" class="form">
                        @csrf

                       <input type="hidden" id="idPrime" name="idPrime" value="{{request()->segment(5)}}" >

                        <div>Voulez vraiment supprimer la prime numéro: {{request()->segment(5)}} </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Confirmer</button>
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
