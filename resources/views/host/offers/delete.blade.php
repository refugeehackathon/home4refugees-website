@extends('layouts.app')
@section('content')
    <h2>Anzeige löschen</h2>

    {!! Form::model($offer, array('url' => 'host/offers/' . $offer->id, 'method' => 'delete', 'class' => 'form-horizontal')) !!}

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            Sind Sie sicher?
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-danger">Löschen</button>
            <a href="{{ url('host/offers/'.$offer->id.'/edit') }}" class="btn btn-default">Abbrechen</a>
        </div>
    </div>

    {!! Form::close() !!}

@endsection