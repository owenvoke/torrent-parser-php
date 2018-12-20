<?php

namespace pxgamer\TorrentParser;

use Illuminate\Support\Collection;

/**
 * Class WorldWideTorrents
 */
class WorldWideTorrents
{
    const BASE_URL = 'https://worldwidetorrents.to';

    /**
     * Search for a specific query string
     *
     * @param  string $query
     * @return Collection
     */
    public static function search(string $query): Collection
    {
        $query = urlencode($query);

        return self::get(self::BASE_URL . '/json.php?dllink=1&q=' . $query);
    }

    /**
     * Get the latest torrents
     *
     * @return Collection
     */
    public static function latest(): Collection
    {
        return self::get(self::BASE_URL . '/json.php');
    }

    /**
     * Search for torrents by a specific username
     *
     * @param  string $username
     * @return Collection
     */
    public static function user(string $username): Collection
    {
        $username = urlencode($username);

        return self::get(self::BASE_URL . '/json.php?username=' . $username);
    }

    /**
     * Perform a GET request
     *
     * @param  string $url
     * @return Collection
     */
    private static function get(string $url): Collection
    {
        $cu = curl_init();
        curl_setopt_array(
            $cu,
            [
                CURLOPT_URL            => $url,
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
     * @param  array $responseData
     * @return Collection
     */
    private static function createCollection(array $responseData): Collection
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
