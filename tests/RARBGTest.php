<?php

use pxgamer\TorrentParser\RARBG;

class RARBGTest extends PHPUnit_Framework_TestCase
{
    public function testRarbgLatest()
    {
        $response = RARBG::latest();
        $this->assertTrue(is_array($response));
    }
}
