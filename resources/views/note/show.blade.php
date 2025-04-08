@extends('layouts.app')
@section('content')
    <a href="{{ route('note.index') }}">Volver</a>
    <hr>
    <h1>{{ $note->title }}</h1>
    <hr>
    <p>{{ $note->description }}</p>
    <img src="/img/{{ $note->urlfoto }}" alt="">
@endsection