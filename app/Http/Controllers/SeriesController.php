<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Http\Requests\SeriesFormRequest;
use App\Season;
use App\Serie;
use App\Service\SerieCreator;
use App\Service\SerieRemover;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function index(Request $request) {
        $series = Serie::query()
            ->orderBy('name')
            ->get();
        $mensagem = $request
            ->session()
            ->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, SerieCreator $serieCreator)
    {
        $serie = $serieCreator->SerieCreate(
            $request->name,
            $request->qtd_temporadas,
            $request->ep_temporada
        );

        $request->session()
        ->flash(
            'mensagem',
            "Série {$serie->name}, com {$serie->qtd_temporadas} temporada/as e {$serie->ep_temporada} episódio/os criados com sucesso!"
        );

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, SerieRemover $serieRemover)
    {
        $serieName = $serieRemover->serieRemove($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Série $serieName removida com sucesso"
            );
        return redirect()->route('listar_series');
    }

    public function nameEdit($id, Request $request)
    {
        $newName = $request->name;
        $serie = Serie::find($id);
        $serie->name = $newName;
        $serie->save();
    }
}
