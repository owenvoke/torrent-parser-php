<?php

use PHPUnit\Framework\TestCase;
use pxgamer\TorrentParser\EZTV;

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
        $this->assertTrue(is_a($response, \Illuminate\Support\Collection::class));
    }
}
