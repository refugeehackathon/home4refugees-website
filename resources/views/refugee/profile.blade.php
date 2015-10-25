@extends('layouts.app')
@section('content')
    <h2>Mein Profil</h2>
    {!! Form::model(Auth::user()->refugee, array('url' => 'refugee/profile', 'method' => 'put', 'class' => 'form-horizontal')) !!}

    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="sex" class="col-sm-3 control-label">Geschlecht</label>
        <div class="col-sm-6">
            {!! Form::select('sex', getSexTypes(), null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="birthday" class="col-sm-3 control-label">Geburtsdatum</label>
        <div class="col-sm-6">
            {!! Form::text('birthday', null, ['class' => 'form-control', 'placeholder' => 'TT.MM.JJJJ']) !!}
        </div>
    </div>

    <hr>

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