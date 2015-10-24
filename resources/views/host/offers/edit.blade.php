@extends('layouts.app')
@section('content')
    <h2>Anzeige bearbeiten</h2>

    {!! Form::model($offer, array('url' => 'host/offers/' . $offer->id, 'method' => 'put', 'files' => true, 'class' => 'form-horizontal')) !!}

    @include('host.offers.form')

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-primary">Speichern</button>
            <a href="{{ url('host/offers') }}" class="btn btn-default">Abbrechen</a>

            <a href="{{ url('host/offers/'.$offer->id.'/delete') }}" class="btn btn-danger pull-right">Löschen</a>
        </div>
    </div>

    {!! Form::close() !!}

@endsection