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

    /**
     * Perform a GET request
     *
     * @param string $endpoint
     * @return mixed
     */
    private static function get($endpoint = '/rssdd_magnet.php')
    {
        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL => self::BASE_URL.$endpoint,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_USERAGENT => 'Torrent Parser PHP'
            ]
        );
        $response = curl_exec($cu);
        $response = str_replace('&nbsp;', ' ', $response);
        $xml = simplexml_load_string($response);

        return self::xml2array($xml)['channel'][0]['item'];
    }
}
