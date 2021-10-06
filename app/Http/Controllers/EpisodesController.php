<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Season;
use Illuminate\Http\Request;
use function foo\func;

class EpisodesController extends Controller
{
    public function index(Season $season, Request $request)
    {

        return view('episodes.index', [
            'episodes' => $season->episodes,
            'seasonId' => $season->id,
            'mensagem' => $request->session()->get('mensagem')
        ]);
    }

    public function watch(Season $season, Request $request)
    {
        $episodesWatched = $request->episodes;
        $season->episodes->each(function (Episode $episode) use ($episodesWatched) {
            $episode->watched = in_array(
                $episode->id,
                $episodesWatched
            );
        });
        $season->push();
        $request->session()->flash('mensagem', 'Episódios marcados como assistidos');

        return redirect()->back();
    }
}
