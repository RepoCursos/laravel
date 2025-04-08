@extends('layouts.app')
@section('title', 'Nueva Nota')

@section('content')

    <!-- Forma de mostrar el error de forma general -->
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <!-- ************************************************************ -->
    <a href="{{ route('note.index') }}">Volver</a>
    <form method="POST" action="{{ route('note.store') }}">
        @csrf
        <label for="">Titulo</label>
        <input type="text" name="title" /> <br>
        @error('title')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <label for="">Descripcion</label>
        <input type="text" name="description" /> <br>
        <!-- Forma de mostrar el error de forma individual -->
        @error('description')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <div class="form-group mt-3">
            <label for="">Foto</label>
            <input type="file" name="urlfoto" class="control-lavel">
        </div>

        <input type="submit" value="Create" />
    </form>
@endsection