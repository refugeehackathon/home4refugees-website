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
        <div class="input-group">
            {!! Form::text('rooms', null, ['class' => 'form-control', 'placeholder' => '2']) !!}
            <span class="input-group-addon">Zimmer</span>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="size" class="col-sm-3 control-label">Größe</label>
    <div class="col-sm-6">
        <div class="input-group">
            {!! Form::text('size', null, ['class' => 'form-control', 'placeholder' => '40']) !!}
            <span class="input-group-addon">m²</span>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="rent" class="col-sm-3 control-label">Miete</label>
    <div class="col-sm-6">
        <div class="input-group">
            {!! Form::text('rent', null, ['class' => 'form-control', 'placeholder' => '150,00']) !!}
            <span class="input-group-addon">Euro</span>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="available" class="col-sm-3 control-label">Verfügbar ab</label>
    <div class="col-sm-6">
        {!! Form::text('available', date('d.m.Y'), ['class' => 'form-control', 'placeholder' => 'TT.MM.JJJJ']) !!}
    </div>
</div>

<div class="form-group">
    <label for="available" class="col-sm-3 control-label">Bilder</label>
    <div class="col-sm-6">
        @if(isset($offer))
            @foreach($offer->pictures()->get() as $picture)
                <div class="checkbox">
                    <label>
                        <input checked="checked" type="checkbox" name="keep_pictures[]" value="{{ $picture->id }}">
                        <img src="{{ url('picture/'. $picture->id) }}" alt="Bild" width="100">
                    </label>
                </div>
            @endforeach
        @endif

        {!! Form::file('pictures[]', ['multiple' => true]) !!}
    </div>
</div>