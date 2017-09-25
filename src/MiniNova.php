<?php

namespace pxgamer\TorrentParser;

use pxgamer\TorrentParser\Traits\Parser;

/**
 * Class MiniNova
 * @package pxgamer\TorrentParser
 *
 * @deprecated 2.0.0 MiniNova was shut down on April 4th, 2017.
 */
class MiniNova
{
    use Parser;

    const BASE_URL = 'http://www.mininova.org';

    /**
     * Search for a specific query string
     *
     * @param string $search_query
     * @return null
     */
    public static function search($search_query)
    {
        return null;
    }

    /**
     * Get the latest torrents
     *
     * @return null
     */
    public static function latest()
    {
        return null;
    }

    /**
     * Search for torrents by a specific username
     *
     * @param string $username
     * @return null
     */
    public static function user($username)
    {
        return null;
    }
}
