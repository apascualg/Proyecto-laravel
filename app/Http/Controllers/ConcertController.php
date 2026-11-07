<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Concert;
use App\Models\Escenari;
use Database\Seeders\EscenariSeeder;
use Illuminate\Http\Request;
use App\Models\Genere;

class ConcertController extends Controller
{

    public function index(Request $request){
        // Préparer la requête avec les relations
        $query = Concert::with(['artista.generes', 'escenari']);

        // Filtre par escenari
        if ($request->filled('escenari_id')) {
            $query->where('escenari_id', $request->escenari_id);
        }

        // Filtre par genre de l'artiste
        if ($request->filled('genere_id')) {
            $query->whereHas('artista.generes', function ($q) use ($request) {
                $q->where('generes.id', $request->genere_id);
            });
        }

        // Filtre par date de début
        if ($request->filled('data_inici')) {
            $query->whereDate('data_hora', '>=', $request->data_inici);
        }

        // Filtre par date de fin
        if ($request->filled('data_fi')) {
            $query->whereDate('data_hora', '<=', $request->data_fi);
        }

        // Récupérer les concerts filtrés
        $concerts = $query->get();

        // Récupérer les options des filtres
        $escenaris = Escenari::orderBy('nom')->get();
        $generes = Genere::orderBy('nom')->get();

        return view('concerts.index', compact(
            'concerts',
            'escenaris',
            'generes'
        ));
    }
    public function create (Concert $concert){
        $artistes = Artista::where('actiu', true)->orderBy('nom')->get();
        $escenaris = Escenari::orderBy('nom')->get();
        return view('concerts.create', compact('artistes', 'escenaris'));
    }
    public function store(Request $request){
        $data = $request->validate([
            'artista_id'        => 'required|exists:artistas,id',
            'nom'       => 'required|string|max:255',
            'data_hora'        => 'required|date',
            'durada_minuts' => 'required|integer|min:15|max:300',
            'tipus'      => 'required|in:CONCERT,DJ_SET,SHOWCASE,ACUSTIC',
            'escenari_id' => 'required|exists:escenaris,id'
        ]);


        Concert::create($data);
        //hago un redirect a una ruta conocida
        return redirect()->route('concerts.index');
    }
    public function show(Concert $concert){
        return view('concerts.show', compact('concert'));
    }
    public function top5(){
        $concerts = Concert::withCount('entrades') ->orderBy('desc');
        return view ('estadistiques', compact('concerts'));
    }
}
