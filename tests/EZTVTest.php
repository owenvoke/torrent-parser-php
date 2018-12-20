<?php

namespace pxgamer\TorrentParser;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

/**
 * Class EZTVTest
 */
class EZTVTest extends TestCase
{
    /**
     * Test for collecting the latest torrents from EZTV
     * @test
     */
    public function eztvLatest(): void
    {
        $response = EZTV::latest();
        $this->assertInstanceOf(Collection::class, $response);
    }
}
