<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Genere;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    public function index()
    {
        $artistas = Artista::with('generes')->orderBy('nom')->get();
        return view('artistas.index', compact('artistas'));
    }

    public function create()
    {
        $vista = 'create';
        $artista = new Artista();
        $generes = Genere::orderBy('nom')->get();
        return view('artistas.form', compact('artista', 'vista', 'generes'));
    }


    public function store(Request $request){
        $data = $request->validate([
            'nom'        => 'required|string|max:255',
            'pais'       => 'required|string|max:255',
            'bio'        => 'nullable|string',
            'imatge_url' => 'nullable|url',
            'actiu'      => 'sometimes|boolean',
            'generes'    => 'nullable|array',
            'generes.*'  => 'exists:generes,id',
        ]);

        $data['actiu'] = $request->boolean('actiu');

        $artista = Artista::create($data);

        $artista->generes()->sync($request->input('generes', []));

        //hago un redirect a una ruta conocida
        return redirect()->route('artistas.index');
    }

    public function show(String $id)
    {
        $artista = Artista::findOrFail($id);
        return view('artistas.show', compact('artista'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {

        $artista = Artista::findOrFail($id);
        $vista = 'update';
        $generes = Genere::orderBy('nom')->get();
        return view('artistas.form', compact('artista', 'vista', 'generes'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artista = Artista::findOrFail($id);

        $data = $request->all();

        // Control del checkbox de estat (true si está marcado, false si no)
        // Actualiza el registro con los nuevos datos
        $artista->update($data);

        $artista->generes()->sync($request->input('generes', []));

        return redirect()->route('artistas.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
