<?php

namespace App\Service;

use App\{Episode, Season, Serie};
use Illuminate\Support\Facades\DB;

class SerieRemover
{
    public function SerieRemove(int $serieId): string
    {
        DB::beginTransaction();

        $serie = Serie::find($serieId);
        $serieName = $serie->name;
        $this->removeSeason($serie);
        $serie->delete();

        DB::commit();

        return $serieName;
    }

    /**
     * @param $serie
     * @throws \Exception
     */
    private function removeSeason(Serie $serie): void
    {
        $serie->seasons->each(function (Season $season) {
            $this->removeEpisode($season);
            $season->delete();
        });
    }

    /**
     * @param Season $season
     * @throws \Exception
     */
    private function removeEpisode(Season $season): void
    {
        $season->episodes()->each(function (Episode $episode) {
            $episode->delete();
        });

    }
}
