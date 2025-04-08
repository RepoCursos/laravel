<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    public function index(): View
    /**para que la funcion sea mas robusta le agregamos el valor que esta retornando la fincion
     en este caso es una vista entonces indicamos ": View"  ver el video Episodio 5 time: 1:28:00*/
    {
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    public function create(): View
    {
        return view('note.create');
    }

    public function store(NoteRequest $request): RedirectResponse
    /**en este caso es una redireccion entonces indicamos ": RedirectResponse"  */
    {
        /**Validacion de datos
         * ESTO NO ES BUENA PRACTICA
         * 1) Estamos agrandando el codigo de nuestro controlador de forma inecesario ya que esto puede ir fuera
         * 2) El contolador esta haciendo 2 acciones distintas, lo cual una funcion siguiendo las normas de buenas practicas
         * debe concentrarce en hacer una sola accion. En este caso hace 2 primero validar datos y luego insertarlos
         * 3) Estamos duplicando codigo ya que el control de validacion la estamos ejecutando tambien el la funcion update
         * y se puede utilizar en otras funciones mas a medida que el sistema crezca 
         * 
         * LA MEJOR PRACTICA ES CREAR UNA CUSTOMREQUEST
         $request->validate([
            'title' => 'required|max:255|min:3',
            'description' => 'required|max:255|min:3'
         ]);
         */

        /** Insercion de datos 
         * Este metodo nos sirve siempre y cuando en el formulario respetaba en el "name" los nombres de cada uno de los 
         * campos que va almacenar 
         */
        Note::create($request->all());
        return redirect()->route('note.index')->with('success', 'Nota creada');

        /**  formato 2 de guardad el un nuevo valor
         * este formato es un atajo (metodo estatico) que sirve solo para crearlo y guardarlo, no para operar con el.
         *Note::create([
         *  'title' => $request->title,
         *  'description' => $request->description
         *]);
         *return redirect()->route('note.index');
         */

        /**  formato 3 de guardad el un nuevo valor
         * este formato sirve para operar con el
         *$note = new Note;
         *$note->title = $request->title;
         *$note->description = $request->description;
         *$note->save();
         *return redirect()->route('note.index');
         */
    }

    public function edit(Note $note): View
    {
        return view('note.edit', compact('note'));

        /** otra forma en la que podramos encontrar como se armo la fncion
         * public function edit(Note $note)
         * 
         * $myNote = Note::find($note);
         * 
         * return view('note.edit', compact('myNote'));
         */
    }

    public function update(NoteRequest $request, Note $note): RedirectResponse
    {

        /* NO HACER LA VALIDACION EN EL CONTROLADOR
            $request->validate([
               'title' => 'required|max:255|min:3',
               'description' => 'required|max:255|min:3'
            ]);
         */
        $note->update($request->all());
        return redirect()->route('note.index')->with('success', 'Nota actualizada');
    }

    public function show(Note $note): View
    {
        return view('note.show', compact('note'));
    }

    public function destroy(Note $note): RedirectResponse
    {
        $note->delete();
        return redirect()->route('note.index')->with('danger', 'Nota eliminada');
    }
}
