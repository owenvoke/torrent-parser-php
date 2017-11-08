<?php

namespace pxgamer\TorrentParser;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

/**
 * Class RARBGTest
 */
class RARBGTest extends TestCase
{
    /**
     * Test for collecting the latest torrents from RARBG
     */
    public function testRarbgLatest()
    {
        $response = RARBG::latest();
        $this->assertTrue(is_a($response, Collection::class));
    }
}
