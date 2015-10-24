<div class="form-group">
    <label for="location" class="col-sm-3 control-label">Postleitzahl</label>
    <div class="col-sm-6">
        {!! Form::text('location', null, ['class' => 'form-control', 'placeholder' => '10315', 'autofocus']) !!}
    </div>
</div>

<div class="form-group">
    <label for="type" class="col-sm-3 control-label">Typ</label>
    <div class="col-sm-6">
        {!! Form::select('type', getOfferTypes(), null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label for="rooms" class="col-sm-3 control-label">Anzahl Räume</label>
    <div class="col-sm-6">
        {!! Form::text('rooms', null, ['class' => 'form-control', 'placeholder' => '2']) !!}
    </div>
</div>

<div class="form-group">
    <label for="rent" class="col-sm-3 control-label">Miete</label>
    <div class="col-sm-6">
        {!! Form::text('rent', null, ['class' => 'form-control', 'placeholder' => '150€']) !!}
    </div>
</div>

<div class="form-group">
    <label for="available" class="col-sm-3 control-label">Verfügbar ab</label>
    <div class="col-sm-6">
        {!! Form::text('available', null, ['class' => 'form-control', 'placeholder' => 'TT.MM.JJJJ']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-10">
        <button type="submit" class="btn btn-primary">Speichern</button>
        <a href="{{ url('host/offers') }}" class="btn btn-default">Abbrechen</a>
    </div>
</div>