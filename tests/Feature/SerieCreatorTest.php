<?php

namespace Tests\Feature;

use App\Serie;
use App\Service\SerieCreator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SerieCreatorTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateSerie()
    {
        $serieCreator = new SerieCreator();
        $serieName = 'Nome de teste';
        $serieCreated = $serieCreator->SerieCreate($serieName, 1,1 );

        $this->assertInstanceOf(Serie::class, $serieCreated);
        $this->assertDatabaseHas('series', ['name' => $serieName]);
        $this->assertDatabaseHas('seasons', ['serie_id' => $serieCreated->id, 'numero' => 1]);
        $this->assertDatabaseHas('episodes', ['numero' => 1]);
    }
}
