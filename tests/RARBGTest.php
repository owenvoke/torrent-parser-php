<?php

use PHPUnit\Framework\TestCase;
use pxgamer\TorrentParser\RARBG;

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
        $this->assertTrue(is_a($response, \Illuminate\Support\Collection::class));
    }
}
