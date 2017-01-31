<?php

use pxgamer\TorrentParser\ExtraTorrent;

class ExtraTorrentTest extends PHPUnit_Framework_TestCase
{
    public function testExtraTorrentSearch()
    {
        $response = ExtraTorrent::search('Search');
        $this->assertTrue(is_array($response));
    }

    public function testExtraTorrentLatest()
    {
        $response = ExtraTorrent::latest();
        $this->assertTrue(is_array($response));
    }

    public function testExtraTorrentUser()
    {
        $response = ExtraTorrent::user('condors');
        $this->assertTrue(is_array($response));
    }
}
