<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Services\CriadorDeSerie;
use App\Temporada;
use App\Episodio;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
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

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {
        $serie = $criadorDeSerie->criarSerie($request->nome, $request->qtd_temporadas, $request->qtd_episodios);

        $request->session()->flash(
            'mensagem',
            'Série '.$serie->nome.' criada com sucesso!'
        );

        return redirect()->route('series_lista');
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        $serie = Serie::find($request->id);
        Serie::destroy($request->id);
        DB::commit();

        $request->session()->flash(
            'mensagem',
            'Série '.$serie->nome.' removida com sucesso!'
        );

        return redirect()->route('series_lista');
    }
}
