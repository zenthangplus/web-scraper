<?php

namespace Zenthangplus\WebScraper;

use DOMDocument;
use Zenthangplus\WebScraper\Contracts\CrawlerResponseInterface;

/**
 * Class ParserAbstraction
 * @package Zenthangplus\WebScraper\Contracts
 */
abstract class ParserAbstraction
{
    /**
     * Document's content
     *
     * @var string
     */
    private $content;

    /**
     * @var DOMDocument
     */
    protected $dom;

    /**
     * ParserAbstraction constructor.
     * @param CrawlerResponseInterface $crawlerResponse
     */
    public function __construct(CrawlerResponseInterface $crawlerResponse)
    {
        // Keep document's content visitable for child classes
        $this->content = $crawlerResponse->getContent();

        // Init DOM Document
        $this->dom = new DOMDocument();

        // Load content into DOM
        $this->loadContent($this->dom);
    }

    /**
     * Load content into DOM document
     *
     * @param DOMDocument &$dom
     * @return mixed
     */
    abstract protected function loadContent(DOMDocument &$dom);

    /**
     * Get document's content
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Get DOM object
     *
     * @return DOMDocument
     */
    public function getDom(): DOMDocument
    {
        return $this->dom;
    }
}
