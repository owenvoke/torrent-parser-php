<?php

namespace pxgamer\TorrentParser;

class WorldWideTorrents
{
    const BASE_URL = 'https://worldwidetorrents.me';

    public static function search($search_query)
    {
        $search_query = urlencode($search_query);

        return self::get('/json.php?dllink=1&q=' . $search_query);
    }

    public static function latest()
    {
        return self::get('/json.php');
    }

    public static function user($username)
    {
        $username = urlencode($username);

        return self::get('/json.php?username=' . $username);
    }

    private static function get($endpoint = '/json.php')
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

        return json_decode($response, true);
    }
}
