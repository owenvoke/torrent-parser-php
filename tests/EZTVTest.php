<?php

namespace pxgamer\TorrentParser;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

/**
 * Class EZTVTest
 */
class EZTVTest extends TestCase
{
    /**
     * Test for collecting the latest torrents from EZTV
     */
    public function testEztvLatest()
    {
        $response = EZTV::latest();
        $this->assertTrue(is_a($response, Collection::class));
    }
}
