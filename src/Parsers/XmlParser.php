<?php

namespace Zenthangplus\WebScraper\Parsers;

use DOMDocument;
use Zenthangplus\WebScraper\ParserAbstraction;

/**
 * Class XmlParser
 * @package Zenthangplus\WebScraper\Parsers
 */
class XmlParser extends ParserAbstraction
{
    /**
     * @return bool
     */
    protected function loadContent(): bool
    {
        // Using @ to ignore warning when document is not pretty
        return @$this->loadXML($this->getContent());
    }
}
