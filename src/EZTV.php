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

    /**
     * Perform a GET request
     *
     * @param string $endpoint
     * @return mixed
     */
    private static function get($endpoint = '/ezrss.xml')
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
