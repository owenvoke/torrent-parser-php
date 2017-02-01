<?php

use pxgamer\TorrentParser\MiniNova;

class MiniNovaTest extends PHPUnit_Framework_TestCase
{
    public function testMiniNovaSearch()
    {
        $response = MiniNova::search('Search');
        $this->assertTrue(is_array($response));
    }

    public function testMiniNovaLatest()
    {
        $response = MiniNova::latest();
        $this->assertTrue(is_array($response));
    }

    public function testMiniNovaUser()
    {
        $response = MiniNova::user('thefetch');
        $this->assertTrue(is_array($response));
    }
}
