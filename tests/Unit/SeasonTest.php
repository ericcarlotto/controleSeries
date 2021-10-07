<?php

namespace Tests\Unit;

use App\Episode;
use App\Season;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeasonTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /** @var Season */
    private $season;

    protected function setUp(): void
    {
        parent::setUp();

        $season = new Season();

        $episode1 = new Episode();
        $episode1->watched = true;

        $episode2 = new Episode();
        $episode2->watched = false;

        $episode3 = new Episode();
        $episode3->watched = true;

        $season->episodes->add($episode1);
        $season->episodes->add($episode2);
        $season->episodes->add($episode3);

        $this->season = $season;
    }

    public function testFindWatchedEpisodes()
    {

        $episodesWatched = $this->season->getEpisodesWatched();

        $this->assertCount(2, $episodesWatched);

        foreach ($episodesWatched as $episode) {
            $this->assertTrue($episode->watched);
        }

    }

    public function testGetAllEpisodes()
    {
        $episodes = $this->season->episodes;
        $this->assertCount(3, $episodes);
    }
}
