<?php

namespace pxgamer\TorrentParser;

use pxgamer\TorrentParser\Traits\Parser;

/**
 * Class EZTV
 * @package pxgamer\TorrentParser
 */
class EZTV
{
    use Parser;

    const BASE_URL = 'https://eztv.ag';

    /**
     * Get the latest torrents
     *
     * @return mixed
     */
    public static function latest()
    {
        return self::get('/ezrss.xml');
    }
}
