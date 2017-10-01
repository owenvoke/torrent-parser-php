<?php

namespace pxgamer\TorrentParser;

use Illuminate\Support\Collection;

/**
 * Class WorldWideTorrents
 */
class WorldWideTorrents
{
    const BASE_URL = 'https://worldwidetorrents.me';

    /**
     * Search for a specific query string
     *
     * @param string $search_query
     * @return Collection
     */
    public static function search($search_query)
    {
        $search_query = urlencode($search_query);

        return self::get(self::BASE_URL . '/json.php?dllink=1&q=' . $search_query);
    }

    /**
     * Get the latest torrents
     *
     * @return Collection
     */
    public static function latest()
    {
        return self::get(self::BASE_URL . '/json.php');
    }

    /**
     * Search for torrents by a specific username
     *
     * @param string $username
     * @return Collection
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
     * @return Collection
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
                CURLOPT_USERAGENT      => 'Torrent Parser PHP'
            ]
        );
        $response = curl_exec($cu);
        $data = json_decode($response, true) ?? [];
        return self::createCollection($data);
    }

    /**
     * Create a new Collection of Torrent instances
     *
     * @param array $responseData
     * @return Collection
     */
    private static function createCollection($responseData)
    {
        $collection = new Collection();

        foreach ($responseData as $element) {
            $torrent = new Torrent();

            $torrent->title = $element['title'] ?? null;
            $torrent->hash = $element['info_hash'] ?? null;
            $torrent->link = $element['link'] ?? null;
            $torrent->category = $element['category'] ?? null;
            $torrent->size = $element['size'] ?? null;
            $torrent->date = $element['publish_date'] ?? null;

            if ($torrent->size) {
                $torrent->size = (int)$torrent->size;
            }

            if ($torrent->date) {
                $torrent->date = new \DateTime($torrent->date);
            }

            $collection[] = $torrent;
        }

        return $collection;
    }
}
