<?php

namespace pxgamer\TorrentParser;

use pxgamer\TorrentParser\Traits\Parser;

/**
 * Class KatCR
 * @package pxgamer\TorrentParser
 *
 * @deprecated 2.1.0 KatCR no longer supports RSS feeds.
 */
class KatCR
{
    use Parser;

    const BASE_URL = 'https://katcr.co';

    /**
     * Get the latest torrents
     *
     * @return null
     */
    public static function latest()
    {
        return null;
    }
}
