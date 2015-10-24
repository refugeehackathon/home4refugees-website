@extends('layouts.app')
@section('content')
    <h2>Meine Anzeigen</h2>

    <a href="{{ url('host/offers/create') }}" class="btn btn-primary">
        Neue Anzeige
    </a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Titel</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach($offers as $offer)
        <tr>
            <td>
                {{ getOfferTypes()[$offer->type] }} -
                {{ $offer->location }} -
                {{ $offer->rooms }} Zimmer -
                {{ $offer->size }} m² -
                {{ $offer->rent }} €
            </td>
            <td class="text-right">
                <a href="{{ url('host/offers/'.$offer->id.'/edit') }}" class="btn btn-xs btn-primary">
                    Bearbeiten
                </a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

@endsection