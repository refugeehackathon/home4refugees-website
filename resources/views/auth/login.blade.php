@extends('layouts.app')
@section('content')
    {!! Form::open(array('url' => 'auth/login', 'class' => 'form-horizontal')) !!}

    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">E-Mail</label>
        <div class="col-sm-6">
            {!! Form::text('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'E-Mail', 'autofocus']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Passwort</label>
        <div class="col-sm-6">
            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Passwort']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-10">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('remember') !!}
                    Angemeldet bleiben
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-10">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </div>

    {!! Form::close() !!}

@endsection