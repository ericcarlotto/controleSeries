<?php

namespace Tests\Feature;

use App\Serie;
use App\Service\SerieCreator;
use App\Service\SerieRemover;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SerieRemoverTest extends TestCase
{
    use RefreshDatabase;

    /** @var Serie */
    private $serie;

    protected function setUp(): void
    {
        parent::setUp();
        $serieCreator = new SerieCreator();
        $this->serie = $serieCreator->SerieCreate('Nome da serie', 1, 1);
    }

    public function testRemoveSerie()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);
        $serieRemover = new SerieRemover();
        $nomeSerie = $serieRemover->SerieRemove($this->serie->id);
        $this->assertIsString($nomeSerie);
        $this->assertEquals('Nome da serie', $this->serie->name);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }
}
