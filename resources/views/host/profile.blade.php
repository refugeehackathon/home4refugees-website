@extends('layouts.app')
@section('content')
    <h2>Mein Profil</h2>
    {!! Form::model(Auth::user()->host, array('url' => 'host/profile', 'method' => 'put', 'class' => 'form-horizontal')) !!}

    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Kontakt E-Mail</label>
        <div class="col-sm-6">
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Kontakt E-Mail']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="mobile" class="col-sm-3 control-label">Telefonnummer</label>
        <div class="col-sm-6">
            {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => '+49123456789']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-10">
            <button type="submit" class="btn btn-primary">Speichern</button>
        </div>
    </div>

    {!! Form::close() !!}

@endsection