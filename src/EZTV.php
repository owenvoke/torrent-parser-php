<?php

namespace pxgamer\TorrentParser;

use pxgamer\TorrentParser\Traits\Parser;

class EZTV
{
    use Parser;

    const BASE_URL = 'https://eztv.ag';

    public static function latest()
    {
        return self::get('/ezrss.xml');
    }

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
