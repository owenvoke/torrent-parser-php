<?php

namespace pxgamer\TorrentParser;

use pxgamer\TorrentParser\Traits\Parser;

/**
 * Class RARBG
 * @package pxgamer\TorrentParser
 */
class RARBG
{
    use Parser;

    const BASE_URL = 'https://rarbg.to';

    /**
     * Get the latest torrents
     *
     * @return mixed
     */
    public static function latest()
    {
        return self::get('/rssdd_magnet.php');
    }
}
