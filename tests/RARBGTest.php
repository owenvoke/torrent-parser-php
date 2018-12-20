<?php

namespace pxgamer\TorrentParser;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

/**
 * Class RARBGTest
 */
class RARBGTest extends TestCase
{
    /**
     * Test for collecting the latest torrents from RARBG
     * @test
     */
    public function rarbgLatest(): void
    {
        $response = RARBG::latest();
        $this->assertInstanceOf(Collection::class, $response);
    }
}
