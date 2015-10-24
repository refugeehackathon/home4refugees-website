@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-sm-6">

        </div>

        <div class="col-sm-6">

            <h2>Angebote</h2>

            @foreach($offers as $offer)


                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="media">
                            <div class="media-left">
                                <a href="{{ url('home/offer/' . $offer->id) }}">
                                    @if($offer->pictures()->first())
                                        <img alt="Bild" class="media-object" style="width: 64px; height: 64px;"
                                             src="{{ url('picture/'.$offer->pictures()->first()->id) }}">
                                    @else
                                        <img alt="Bild" class="media-object" style="width: 64px; height: 64px;"
                                             src="{{ asset('web/dist/app/image/home.png') }}">
                                    @endif
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="{{ url('home/offer/' . $offer->id) }}">
                                        {{ getOfferTypes()[$offer->type] }} in
                                        {{ $offer->location }} Berlin
                                    </a>
                                </h4>
                                {{ $offer->rooms }} Zimmer &bull;
                                {{ $offer->size }} m² &bull;
                                {{ $offer->rent }} €
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

@endsection