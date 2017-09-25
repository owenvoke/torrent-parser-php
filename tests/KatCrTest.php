<?php

use PHPUnit\Framework\TestCase;
use pxgamer\TorrentParser\KatCR;

/**
 * Class KatCrTest
 */
class KatCrTest extends TestCase
{
    /**
     * Test for collecting the latest torrents from KatCR
     */
    public function testKatCrLatest()
    {
        $response = KatCR::latest();
        $this->assertTrue(is_array($response));
    }
}
