<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem  = $request->session()->get('mensagem');

        return view('series.index', [
            'series' => $series,
            'mensagem' => $mensagem
        ]);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());
        $request->session()->flash(
            'mensagem',
            'Série criada com sucesso!'
        );

        return redirect()->route('series_lista');
    }

    public function destroy(Request $request){
        Serie::destroy($request->id);
        $request->session()->flash(
            'mensagem',
            'Série removida com sucesso!'
        );

        return redirect()->route('series_lista');
    }
}
