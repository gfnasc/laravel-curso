<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Temporada;
use App\Episodio;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\App;

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

    public function store(SeriesFormRequest $request)
    {

        $serie = Serie::create([
            'nome' => $request->nome
        ]);

        $qtdTemporadas = $request->qtd_temporadas;
        for ($i = 1; $i <= $qtdTemporadas; $i++)
        {
            $temporada = $serie->temporadas()->create([
                'numero' => $i
            ]);

            for ($j = 1; $j <= $request->qtd_episodios; $j++)
            {
                $temporada->episodios()->create([
                    'numero' => $j,
                ]);
            }
        }



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
