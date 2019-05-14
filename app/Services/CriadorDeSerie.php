<?php

namespace App\Services;


use App\Serie;

class CriadorDeSerie
{

    public function criarSerie($nomeSerie, $qtdTemporadas, $qtdEpisodios)
    {
        $serie = Serie::create([
            'nome' => $nomeSerie
        ]);

        for ($i = 1; $i <= $qtdTemporadas; $i++)
        {
            $temporada = $serie->temporadas()->create([
                'numero' => $i
            ]);

            for ($j = 1; $j <= $qtdEpisodios; $j++)
            {
                $temporada->episodios()->create([
                    'numero' => $j,
                ]);
            }
        }

        return $serie;
    }

}