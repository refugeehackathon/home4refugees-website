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

        @foreach(Auth::user()->host->offers as $offer)
        <tr>
            <td>Titel</td>
            <td>
                <a href="#" class="btn btn-xs btn-primary">
                    Bearbeiten
                </a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

@endsection