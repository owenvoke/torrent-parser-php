# torrent-parser-php

A collection of parsers for various torrent RSS/JSON feeds.

## Currently Supported Feeds

- [~~ExtraTorrent~~](src/ExtraTorrent.php) (Deprecated)
- [WorldWide Torrents](src/WorldWideTorrents.php)
- [~~MiniNova~~](src/MiniNova.php) (Deprecated)
- [RARBG](src/RARBG.php)
- [EZTV](src/EZTV.php)
- [~~KatCR~~](src/KatCR.php)

## Usage

__Include the class:__

#### Using Composer  
`composer require pxgamer/torrent-parser-php`  
```php
<?php
require 'vendor/autoload.php';
```

#### Including the file manually  
```php
<?php
include 'src/Client.php';
```

## Functions

For the parsers there are a few functions...

The static `search` function:
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\*CLIENT*::search('Search Query');
```

The static `latest` function:
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\*CLIENT*::latest();
```

The static `user` function:
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\*CLIENT*::user('username');
```

All parameters are returned as an array of objects.

## Examples

### ExtraTorrent

_Search_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\ExtraTorrent::search('Search Query');
```

_Latest_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\ExtraTorrent::latest();
```

_User_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\ExtraTorrent::user('username');
```

_Example Returned Data_
```php
(
    [0] => Array
        (
            [title] => Stop, Search, Seize - S01E02.mp4
            [pubDate] => Tue, 31 Jan 2017 04:14:51 +0000
            [category] => TV
            [link] => http://extratorrent.cc/torrent/5435205/Stop%2C+Search%2C+Seize+-+S01E02.mp4.html
            [enclosure]=>
                [magnetURI] => magnet:?xt=urn:btih:838dd74bf652a6a0683a335ae31129de4400be04
            [guid] => http://extratorrent.cc/torrent/5435205/*.html
            [description] => ...
            [size] => 363679482
            [seeders] => 96
            [leechers] => 82
            [info_hash] => 838dd74bf652a6a0683a335ae31129de4400be04
        )
)
```

### WorldWide Torrents

_Search_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\WorldWideTorrents::search('Search Query');
```

_Latest_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\WorldWideTorrents::latest();
```

_User_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\WorldWideTorrents::user('username');
```

_Example Returned Data_
```php
(
    [0] => Array
        (
            [id] => 13498
            [guid] => 13498
            [title] => Educational Research: Competencies for Analysis and Applications (11th Global Edition) by Geoffrey E. Mills [Dr.Soc]
            [category] => Books > Textbooks
            [publish_date] => Sat, 10 Sep 2016 04:41:40 +0100
            [size] => 42.05 MB
            [seeders] => 105
            [leechers] => 30
            [info_hash] => 460418187943c439d37365a7e78e773e3fba3871
            [link] => https://worldwidetorrents.eu/download.php?id=13498
            [magnet] => magnet:?xt=urn:btih:460418187943c439d37365a7e78e773e3fba3871
        )
)
```

### MiniNova

_Search_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\MiniNova::search('Search Query');
```

_Latest_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\MiniNova::latest();
```

_User_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\MiniNova::user('username');
```

_Example Returned Data_
```php
(
    [0] => Array
        (
            [title] => Searchquest Pimp Game Free Download - - - - - - - - - - - - - - - - - -.zipSearchquest Pimp Game Fre
            [guid] => http://www.mininova.org/tor/13358750
            [pubDate] => Thu, 22 Sep 2016 13:32:10 +0200
            [category] => Games
            [link] => http://www.mininova.org/tor/13358750
            [enclosure] =>
            [description] => ...
        )
)
```

### RARBG

*__NOTE:__ RARBG only supports the `::latest()` function.*

_Latest_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\RARBG::latest();
```

_Example Returned Data_
```php
(
    [0] => Array
        (
            [title] => LaNovice.17.02.01.Tania.Kiss.FRENCH.XXX.1080p.MP4-KTR
            [description] => ...
            [link] => magnet:?xt=urn:btih:14eb628b0b5e651c4d40dab01dd7614a09ff4aae
            [guid] => magnet:?xt=urn:btih:14eb628b0b5e651c4d40dab01dd7614a09ff4aae
            [pubDate] => Wed, 01 Feb 2017 09:59:50 +0100
        )
)
```

### EZTV

*__NOTE:__ EZTV only supports the `::latest()` function.*

_Latest_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\EZTV::latest();
```

_Example Returned Data_
```php
(
    [0] => Array
        (
            [title] => Switched at Birth S05E01 HDTV x264-FLEET
            [category] => TV
            [link] => https://eztv.ag/ep/189266/switched-at-birth-s05e01-hdtv-x264-fleet/
            [guid] => https://eztv.ag/ep/189266/switched-at-birth-s05e01-hdtv-x264-fleet/
            [pubDate] => Tue, 31 Jan 2017 22:03:02 -0500
            [enclosure] =>
        )
)
```

### KatCR

*__NOTE:__ KatCR only supports the `::latest()` function.*

_Latest_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\KatCR::latest();
```

_Example Returned Data_
```php
(
    [0] => Array
        (
            [title] => MySistersHotFriend - Aubrey Sinclair 02 02 17
            [guid] => https://katcr.co/new/download.php?id=29373
            [link] => https://katcr.co/new/download.php?id=29373
            [pubDate] => Thu, 02 Feb 2017 09:47:19 +0000
            [category] =>  XXX: Videos
            [description] => Category: XXX: Videos  Size: 329.91 MB Added: 2017-02-02 09:47:19 Seeders: 8 Leechers: 0
        )
)
```
