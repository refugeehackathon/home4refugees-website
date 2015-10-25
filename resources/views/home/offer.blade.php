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

    <div class="row">

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Bilder</div>
                <div class="panel-body">

                    @if(count($offer->pictures) == 0)
                        <i>Keine Bilder</i>
                    @endif

                    @foreach($offer->pictures as $picture)
                        <a href="{{ url('picture/'.$picture->id) }}">
                            <img src="{{ url('picture/'.$picture->id) }}" alt="Bild" width="100">
                        </a>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Kontaktinformationen</div>
                <div class="panel-body">

                    @if(Auth::check())
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        @if(strlen($offer->host->email) > 0)
                            {{ $offer->host->email }}
                        @else
                            <i>Keine Adresse hinterlegt</i>
                        @endif
                        <br>
                        <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                        @if(strlen($offer->host->mobile) > 0)
                            {{ $offer->host->mobile }}
                        @else
                            <i>Keine Telefonnummer hinterlegt</i>
                        @endif
                    @else
                        <i>Bitte anmelden.</i>
                    @endif



                </div>
            </div>
        </div>

    </div>

@endsection