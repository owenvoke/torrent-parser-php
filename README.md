# torrent-parser-php

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Style CI][ico-styleci]][link-styleci]
[![Code Coverage][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A collection of parsers for various torrent RSS/JSON feeds.

## Install

Via Composer

```bash
$ composer require pxgamer/torrent-parser-php
```

## Usage

All parameters are returned as a [Collection](https://github.com/tightenco/collect) of [`Torrent`](src/Torrent.php) instances.

### Currently Supported Feeds

- [WorldWide Torrents](src/WorldWideTorrents.php)
- [RARBG](src/RARBG.php)
- [EZTV](src/EZTV.php)
- [LimeTorrents](src/LimeTorrents.php)

### Examples

#### WorldWide Torrents

_Search_
```php
use \pxgamer\TorrentParser;
TorrentParser\WorldWideTorrents::search('Search Query');
```

_Latest_
```php
use \pxgamer\TorrentParser;
TorrentParser\WorldWideTorrents::latest();
```

_User_
```php
use \pxgamer\TorrentParser;
TorrentParser\WorldWideTorrents::user('username');
```

#### RARBG

*__NOTE:__ RARBG only supports the `::latest()` function.*

_Latest_
```php
use \pxgamer\TorrentParser;
TorrentParser\RARBG::latest();
```

#### EZTV

*__NOTE:__ EZTV only supports the `::latest()` function.*

_Latest_
```php
use \pxgamer\TorrentParser;
TorrentParser\EZTV::latest();
```

#### LimeTorrents

*__NOTE:__ LimeTorrents only supports the `::latest()` function.*

_Latest_
```php
use \pxgamer\TorrentParser;
TorrentParser\LimeTorrents::latest();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CODE_OF_CONDUCT](.github/CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email security@pxgamer.xyz instead of using the issue tracker.

## Credits

- [pxgamer][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pxgamer/torrent-parser-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pxgamer/torrent-parser-php/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/80509300/shield
[ico-code-quality]: https://img.shields.io/codecov/c/github/pxgamer/torrent-parser-php.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pxgamer/torrent-parser-php.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pxgamer/torrent-parser-php
[link-travis]: https://travis-ci.org/pxgamer/torrent-parser-php
[link-styleci]: https://styleci.io/repos/80509300
[link-code-quality]: https://codecov.io/gh/pxgamer/torrent-parser-php
[link-downloads]: https://packagist.org/packages/pxgamer/torrent-parser-php
[link-author]: https://github.com/pxgamer
[link-contributors]: ../../contributors
