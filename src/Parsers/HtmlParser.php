<?php

namespace Zenthangplus\WebScraper\Parsers;

use DOMDocument;
use Zenthangplus\WebScraper\ParserAbstraction;

class HtmlParser extends ParserAbstraction
{
    /**
     * @return mixed|void
     */
    public function loadContent()
    {
        $this->loadHTML($this->getContent());
    }
}
