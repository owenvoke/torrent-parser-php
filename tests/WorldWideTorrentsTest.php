<?php

use pxgamer\TorrentParser\WorldWideTorrents;

class WorldWideTorrentsTest extends PHPUnit_Framework_TestCase
{
    public function testWorldWideTorrentsSearch()
    {
        $response = WorldWideTorrents::search('Search');
        $this->assertTrue(is_array($response));
    }

    public function testWorldWideTorrentsLatest()
    {
        $response = WorldWideTorrents::latest();
        $this->assertTrue(is_array($response));
    }
}
