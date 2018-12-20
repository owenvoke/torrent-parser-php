<?php

namespace pxgamer\TorrentParser;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

/**
 * Class WorldWideTorrentsTest
 */
class WorldWideTorrentsTest extends TestCase
{
    /**
     * Test for collecting search results from WorldWideTorrents
     * @test
     */
    public function worldWideTorrentsSearch(): void
    {
        $response = WorldWideTorrents::search('Search');
        $this->assertInstanceOf(Collection::class, $response);
    }

    /**
     * Test for collecting the latest torrents from WorldWideTorrents
     * @test
     */
    public function worldWideTorrentsLatest(): void
    {
        $response = WorldWideTorrents::latest();
        $this->assertInstanceOf(Collection::class, $response);
    }

    /**
     * Test for collecting a user's torrents from WorldWideTorrents
     * @test
     */
    public function worldWideTorrentsUser(): void
    {
        $response = WorldWideTorrents::user('pxgamer');
        $this->assertInstanceOf(Collection::class, $response);
    }
}
