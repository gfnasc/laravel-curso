<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index($serie_id)
    {
        $serie = Serie::find($serie_id);
        $temporadas = $serie->temporadas;

        return view('temporadas.index', [
            'temporadas' => $temporadas,
            'serie' => $serie
        ]);
    }
}
