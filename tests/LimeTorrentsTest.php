<?php

namespace pxgamer\TorrentParser;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

/**
 * Class LimeTorrentsTest
 */
class LimeTorrentsTest extends TestCase
{
    /**
     * Test for collecting the latest torrents from LimeTorrents
     */
    public function testLimeTorrentsLatest()
    {
        $response = LimeTorrents::latest();
        $this->assertInstanceOf(Collection::class, $response);
    }
}
