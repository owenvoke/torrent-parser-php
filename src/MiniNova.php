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
     * @return mixed
     */
    public static function search($search_query)
    {
        $search_query = urlencode($search_query);

        return self::get('/rss/'.$search_query);
    }

    /**
     * Get the latest torrents
     *
     * @return mixed
     */
    public static function latest()
    {
        return self::get('/rss.xml');
    }

    /**
     * Search for torrents by a specific username
     *
     * @param string $username
     * @return mixed
     */
    public static function user($username)
    {
        $username = urlencode($username);

        return self::get('/rss.xml?user='.$username);
    }

    /**
     * Perform a GET request
     *
     * @param string $endpoint
     * @return mixed
     */
    private static function get($endpoint = '/rss.xml')
    {
        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL => self::BASE_URL.$endpoint,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_RETURNTRANSFER => 1,
            ]
        );
        $response = curl_exec($cu);
        $response = str_replace('&nbsp;', ' ', $response);
        $xml = simplexml_load_string($response);

        return self::xml2array($xml)['channel'][0]['item'];
    }
}
