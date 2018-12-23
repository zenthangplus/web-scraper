<?php

namespace Zenthangplus\WebScraper\Parsers;

use DOMDocument;
use Zenthangplus\WebScraper\ParserAbstraction;

class HtmlParser extends ParserAbstraction
{
    /**
     * @param DOMDocument $dom
     * @return mixed|void
     */
    public function loadContent(DOMDocument &$dom)
    {
        $dom->loadHTML($this->getContent());
    }
}
