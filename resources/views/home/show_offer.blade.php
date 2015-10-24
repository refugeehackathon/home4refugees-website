@extends('layouts.app')
@section('content')

    <h2>Angebot</h2>

    <div class="row">

        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">Typ</div>
                <div class="panel-body">
                    {{ getOfferTypes()[$offer->type] }}
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">Zimmer</div>
                <div class="panel-body">
                    {{ $offer->rooms }}
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">Größe</div>
                <div class="panel-body">
                    {{ $offer->size }} m²
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">Miete</div>
                <div class="panel-body">
                    {{ $offer->rent }} €
                </div>
            </div>
        </div>



    </div>

@endsection