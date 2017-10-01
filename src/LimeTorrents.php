<?php

namespace pxgamer\TorrentParser;

use Illuminate\Support\Collection;
use pxgamer\TorrentParser\Traits\Parser;

/**
 * Class LimeTorrents
 */
class LimeTorrents
{
    use Parser;

    const BASE_URL = 'https://limetorrents.cc';

    /**
     * Get the latest torrents
     *
     * @return mixed
     */
    public static function latest()
    {
        $data = self::get(self::BASE_URL . '/rss/');

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
            $torrent->link = $element['link'] ?? null;
            $torrent->category = $element['category'] ?? null;
            $torrent->size = $element['size'] ?? null;
            $torrent->date = $element['pubDate'] ?? null;

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