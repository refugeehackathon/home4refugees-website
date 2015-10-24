@extends('layouts.app')
@section('content')
    <h2>Neue Anzeige</h2>

    {!! Form::open(array('url' => 'host/offers', 'files' => true, 'class' => 'form-horizontal')) !!}

    @include('host.offers.form')

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-10">
            <button type="submit" class="btn btn-primary">Speichern</button>
            <a href="{{ url('host/offers') }}" class="btn btn-default">Abbrechen</a>
        </div>
    </div>

    {!! Form::close() !!}

@endsection