<?php

namespace pxgamer\TorrentParser;

/**
 * Class Torrent
 */
class Torrent
{
    /**
     * The title of the torrent
     *
     * @var string
     */
    public $title;
    /**
     * The 40 character sha1 info hash of the torrent
     *
     * @var string|null
     */
    public $hash;
    /**
     * The provided link to the torrent
     *
     * @var string
     */
    public $link;
    /**
     * The provided category title
     *
     * @var string|null
     */
    public $category;
    /**
     * The size of the torrent in bytes
     *
     * @var int|null
     */
    public $size;
    /**
     * A datetime instance based off the upload date
     *
     * @var \DateTime|null
     */
    public $date;
}
