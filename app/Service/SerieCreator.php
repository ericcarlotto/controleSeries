<?php

namespace App\Service;

use App\Serie;
use Illuminate\Support\Facades\DB;

class SerieCreator
{
    public function SerieCreate(string $nameSerie, int $qtdTemporadas, int $ep_temporada): Serie
    {
        DB::beginTransaction();

        $serie = Serie::create(['name' => $nameSerie]);
        $this->seasonCreate($qtdTemporadas, $serie, $ep_temporada);

        DB::commit();

        return $serie;
    }

    /**
     * @param int $qtdTemporadas
     * @param $serie
     * @param int $ep_temporada
     */
    public function seasonCreate(int $qtdTemporadas, $serie, int $ep_temporada): void
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $season = $serie->seasons()->create(['numero' => $i]);

            $this->episodeCreate($ep_temporada, $season);
        }
    }

    /**
     * @param int $ep_temporada
     * @param $season
     */
    public function episodeCreate(int $ep_temporada, $season): void
    {
        for ($j = 1; $j <= $ep_temporada; $j++) {
            $season->episodes()->create(['numero' => $j]);
        }
    }
}
