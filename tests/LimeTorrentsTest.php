<?php

use PHPUnit\Framework\TestCase;
use pxgamer\TorrentParser\LimeTorrents;

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
        $this->assertTrue(is_a($response, \Illuminate\Support\Collection::class));
    }
}
