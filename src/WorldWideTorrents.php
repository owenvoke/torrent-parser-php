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

        return self::get(self::BASE_URL . '/json.php?dllink=1&q=' . $search_query);
    }

    /**
     * Get the latest torrents
     *
     * @return mixed
     */
    public static function latest()
    {
        return self::get(self::BASE_URL . '/json.php');
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

        return self::get(self::BASE_URL . '/json.php?username=' . $username);
    }

    /**
     * Perform a GET request
     *
     * @param string $url
     * @return mixed
     */
    private static function get(string $url)
    {
        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL            => $url,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_FOLLOWLOCATION => 1,
                CURLOPT_USERAGENT => 'Torrent Parser PHP'
            ]
        );
        $response = curl_exec($cu);

        return json_decode($response, true);
    }
}
