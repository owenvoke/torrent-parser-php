<?php

namespace pxgamer\TorrentParser\Traits;

/**
 * Trait Parser
 * @package pxgamer\TorrentParser\Traits
 */
trait Parser
{
    /**
     * Convert a SimpleXMLElement to an array
     *
     * @param \SimpleXMLElement $xml
     * @return array
     */
    private static function xml2array(\SimpleXMLElement $xml)
    {
        $arr = [];

        if ($xml) {
            /** @var \SimpleXMLIterator $r */
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
}