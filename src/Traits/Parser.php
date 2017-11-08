<?php

namespace pxgamer\TorrentParser\Traits;

/**
 * Trait Parser
 */
trait Parser
{
    /**
     * Convert a SimpleXMLElement to an array
     *
     * @param  \SimpleXMLElement $xml
     * @return array
     */
    private static function xml2array(\SimpleXMLElement $xml)
    {
        $arr = [];

        if ($xml) {
            /**
 * @var \SimpleXMLIterator $r 
*/
            foreach ($xml->children() as $r) {
                $t = [];
                if (!is_null($r) && count($r->children()) == 0) {
                    $arr[$r->getName()] = strval($r);
                } else {
                    $arr[$r->getName()][] = self::xml2array($r);
                }
            }
        }

        return $arr;
    }

    /**
     * Perform a GET request
     *
     * @param  string $url
     * @return mixed
     */
    private static function get(string $url)
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
        $response = str_replace('&nbsp;', ' ', $response);
        $xml = simplexml_load_string($response);

        return self::xml2array($xml)['channel'][0]['item'];
    }
}