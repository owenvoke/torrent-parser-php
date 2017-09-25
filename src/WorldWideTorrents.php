<?php

namespace pxgamer\TorrentParser;

/**
 * Class WorldWideTorrents
 * @package pxgamer\TorrentParser
 */
class WorldWideTorrents
{
    const BASE_URL = 'https://worldwidetorrents.me';

    /**
     * Search for a specific query string
     *
     * @param string $search_query
     * @return mixed
     */
    public static function search($search_query)
    {
        $search_query = urlencode($search_query);

        return self::get('/json.php?dllink=1&q=' . $search_query);
    }

    /**
     * Get the latest torrents
     *
     * @return mixed
     */
    public static function latest()
    {
        return self::get('/json.php');
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

        return self::get('/json.php?username=' . $username);
    }

    /**
     * Perform a GET request
     *
     * @param string $endpoint
     * @return mixed
     */
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
