<?php

namespace pxgamer\TorrentParser;

use pxgamer\TorrentParser\Traits\Parser;

/**
 * Class KatCR
 * @package pxgamer\TorrentParser
 */
class KatCR
{
    use Parser;

    const BASE_URL = 'https://katcr.co';

    /**
     * Get the latest torrents
     *
     * @return mixed
     */
    public static function latest()
    {
        return self::get('/new/rss.php?dllink=1');
    }

    /**
     * Perform a GET request
     *
     * @param string $endpoint
     * @return mixed
     */
    private static function get($endpoint = '/new/rss.php')
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
