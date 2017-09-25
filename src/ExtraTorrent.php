<?php

namespace pxgamer\TorrentParser;

use pxgamer\TorrentParser\Traits\Parser;

class ExtraTorrent
{
    use Parser;

    const BASE_URL = 'https://extra.to';

    public static function search($search_query)
    {
        $search_query = urlencode($search_query);

        return self::get('/rss.xml?type=search&search=' . $search_query);
    }

    public static function latest()
    {
        return self::get('/rss.xml');
    }

    public static function user($username)
    {
        $username = urlencode($username);

        return self::get('/rss.xml?type=user&user=' . $username);
    }

    private static function get($endpoint = '/rss.xml')
    {
        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL            => self::BASE_URL . $endpoint,
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
