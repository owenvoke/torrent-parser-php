<?php

use pxgamer\TorrentParser\EZTV;

class EZTVTest extends PHPUnit_Framework_TestCase
{
    public function testEztvLatest()
    {
        $response = EZTV::latest();
        $this->assertTrue(is_array($response));
    }
}
