@extends('layouts.app')
@section('title', 'Notas')

<!-- El @-section Directiva, como su nombre indica, define una sección de contenido que se inyectara en la yield directiva -->
@section('content')
    <ul>
        <!-- la directava route es para establecer la ruta de forma mas robusta -->
        <li> <a href="{{ route('landing') }}">HOME</a> </li>
        <li> <a href="{{ route('note.create') }}">Crear nueva nota</a> </li>
    </ul>

    <div class="card" style="width: 18rem;">
        @forelse ($notes as $note)
            <img src="{{ $note->urlfoto }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('note.show', $note->id) }}">{{ $note->title }}</a></h5>

                <a href="{{ route('note.edit', $note->id) }}" class="btn btn-primary">Editar</a>
                <form method="POST" action="{{ route('note.destroy', $note->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="ELIMINAR" class="btn btn-danger" />
                </form>
            </div>
        @empty
            <p>No hay datos</p>
        @endforelse
    </div>
@endsection