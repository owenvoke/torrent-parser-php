<?php

use pxgamer\TorrentParser;

class MainTest extends PHPUnit_Framework_TestCase
{
    public function testExtraTorrent()
    {
        $response = TorrentParser\ExtraTorrent::search('Search');
        $this->assertTrue(is_array($response));
    }

    public function testWorldWideTorrents()
    {
        $response = TorrentParser\WorldWideTorrents::search('Search');
        $this->assertTrue(is_array($response));
    }
}
