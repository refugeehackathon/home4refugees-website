@extends('layouts.app')
@section('content')

    <h2>Angebote</h2>

    {!! Form::open(array('url' => 'home/offers', 'class' => 'form-inline')) !!}
        <div class="form-group">


            {!! Form::select('type', [0=>'- Typ -']+getOfferTypes(), Request::input('type'), ['class' => 'form-control']) !!}

        </div>
        <div class="form-group">

            {!! Form::select('rooms', [0=>'- Zimmer -']+getRoomFilterTypes(), Request::input('rooms'), ['class' => 'form-control']) !!}

        </div>
        <div class="form-group">

            {!! Form::select('size', [0=>'- Größe -']+getSizeFilterTypes(), Request::input('size'), ['class' => 'form-control']) !!}

        </div>
        <div class="form-group">

            {!! Form::select('rent', [0=>'- Miete -']+getRentFilterTypes(), Request::input('rent'), ['class' => 'form-control']) !!}

        </div>
        <button type="submit" class="btn btn-default">Filtern</button>
    {!! Form::close() !!}
    <br>

    @if(count($offers) == 0)
        <i>Keine Ergebnisse</i>
    @endif

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

@endsection