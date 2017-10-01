# torrent-parser-php

A collection of parsers for various torrent RSS/JSON feeds.

[![Build Status](https://travis-ci.org/pxgamer/torrent-parser-php.svg?branch=master)](https://travis-ci.org/pxgamer/torrent-parser-php)
[![Version](https://img.shields.io/packagist/v/pxgamer/torrent-parser-php.svg)](https://packagist.org/p/pxgamer/torrent-parser-php)
[![License](https://img.shields.io/packagist/l/pxgamer/torrent-parser-php.svg)](https://opensource.org/licenses/mit-license)

All parameters are returned as a [Collection](https://github.com/tightenco/collect) of [`Torrent`](src/Torrent.php) instances.

## Currently Supported Feeds

- [WorldWide Torrents](src/WorldWideTorrents.php)
- [RARBG](src/RARBG.php)
- [EZTV](src/EZTV.php)
- [LimeTorrents](src/LimeTorrents.php)

## Usage

#### Using Composer  
`composer require pxgamer/torrent-parser-php`  
```php
<?php
require 'vendor/autoload.php';
```

## Examples

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

### RARBG

*__NOTE:__ RARBG only supports the `::latest()` function.*

_Latest_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\RARBG::latest();
```

### EZTV

*__NOTE:__ EZTV only supports the `::latest()` function.*

_Latest_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\EZTV::latest();
```


### LimeTorrents

*__NOTE:__ LimeTorrents only supports the `::latest()` function.*

_Latest_
```php
<?php
use \pxgamer\TorrentParser;
TorrentParser\LimeTorrents::latest();
```
