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
     */
    public function testWorldWideTorrentsSearch()
    {
        $response = WorldWideTorrents::search('Search');
        $this->assertTrue(is_a($response, Collection::class));
    }

    /**
     * Test for collecting the latest torrents from WorldWideTorrents
     */
    public function testWorldWideTorrentsLatest()
    {
        $response = WorldWideTorrents::latest();
        $this->assertTrue(is_a($response, Collection::class));
    }

    /**
     * Test for collecting a user's torrents from WorldWideTorrents
     */
    public function testWorldWideTorrentsUser()
    {
        $response = WorldWideTorrents::user('wasted');
        $this->assertTrue(is_a($response, Collection::class));
    }
}
