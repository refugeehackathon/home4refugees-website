@extends('layouts.app')
@section('content')
    <h2>Flüchtling Registrierung</h2>
    {!! Form::open(array('url' => 'auth/register/refugee', 'class' => 'form-horizontal')) !!}

    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">E-Mail</label>
        <div class="col-sm-6">
            {!! Form::text('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'E-Mail']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Passwort</label>
        <div class="col-sm-6">
            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Passwort']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="col-sm-3 control-label">Passwort wiederholen</label>
        <div class="col-sm-6">
            {!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Passwort wiederholen']) !!}
        </div>
    </div>

    <hr>

    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-6">
            {!! Form::text('name', '', ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Name']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="sex" class="col-sm-3 control-label">Geschlecht</label>
        <div class="col-sm-6">
            {!! Form::select('sex', ['w'=>'Weiblich', 'm'=>'Männlich'], null, ['id' => 'sex', 'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="birthday" class="col-sm-3 control-label">Geburtsdatum</label>
        <div class="col-sm-6">
            {!! Form::text('birthday', '', ['id' => 'birthday', 'class' => 'form-control', 'placeholder' => 'TT.MM.JJJJ']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-10">
            <button type="submit" class="btn btn-primary">Registrieren</button>
        </div>
    </div>

    {!! Form::close() !!}

@endsection