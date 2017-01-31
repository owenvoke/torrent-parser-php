# torrent-parser-php

A collection of parsers for various torrent RSS/JSON feeds.

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

For all parsers there are a few functions...

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