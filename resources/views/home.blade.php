@extends('layouts.app')

@section('title', 'Kezdőlap')

@section('content')

<section id="intro" class="wrapper style1 fullscreen fade-up">
    <div class="inner">
        <h1>Mozi Projekt</h1>
        <p>Laravel + Hyperspace alapú reszponzív weboldal<br />
        Adatbázis: filmek – mozik – hely kapcsolatok</p>
        <ul class="actions">
            <li><a href="{{ route('films.index') }}" class="button scrolly">Filmek megtekintése</a></li>
        </ul>
    </div>
</section>

@endsection
