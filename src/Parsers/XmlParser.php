<?php

namespace Zenthangplus\WebScraper\Parsers;

use DOMDocument;
use Zenthangplus\WebScraper\ParserAbstraction;

class XmlParser extends ParserAbstraction
{
    /**
     * @return mixed|void
     */
    protected function loadContent()
    {
        $this->loadXML($this->getContent());
    }
}
