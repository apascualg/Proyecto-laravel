<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Concert;
use App\Models\Escenari;
use Database\Seeders\EscenariSeeder;
use Illuminate\Http\Request;

class ConcertController extends Controller
{

    public function index(){
        $concerts = Concert::with(['artista', 'escenari'])->get();
        return view('concerts.index', compact('concerts'));
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
