<?php

use pxgamer\TorrentParser\KatCR;

class KatCrTest extends PHPUnit_Framework_TestCase
{
    public function testKatCrLatest()
    {
        $response = KatCR::latest();
        $this->assertTrue(is_array($response));
    }
}
