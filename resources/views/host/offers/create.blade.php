@extends('layouts.app')
@section('content')
    <h2>Neue Anzeige</h2>

    {!! Form::open(array('url' => 'host/offers', 'class' => 'form-horizontal')) !!}

    @include('host.offers.form')

    {!! Form::close() !!}

@endsection