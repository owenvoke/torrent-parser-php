<?php

namespace pxgamer\TorrentParser;

use Illuminate\Support\Collection;
use pxgamer\TorrentParser\Traits\Parser;

/**
 * Class RARBG
 */
class RARBG
{
    use Parser;

    const BASE_URL = 'https://rarbg.to';

    /**
     * Get the latest torrents
     *
     * @return Collection
     */
    public static function latest(): Collection
    {
        $data = self::get(self::BASE_URL . '/rssdd.php');

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
            $torrent->link = $element['link'] ?? null;
            $torrent->date = $element['pubDate'] ?? null;

            if ($torrent->date) {
                $torrent->date = new \DateTime($torrent->date);
            }

            $collection[] = $torrent;
        }

        return $collection;
    }
}
