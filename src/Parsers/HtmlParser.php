<?php

namespace Zenthangplus\WebScraper\Parsers;

use DOMDocument;
use Zenthangplus\WebScraper\ParserAbstraction;

/**
 * Class HtmlParser
 * @package Zenthangplus\WebScraper\Parsers
 */
class HtmlParser extends ParserAbstraction
{
    /**
     * @return bool
     */
    protected function loadContent(): bool
    {
        // Using @ to ignore warning when document is not pretty
        return @$this->loadHTML($this->getContent());
    }
}
