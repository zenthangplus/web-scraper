<?php

namespace Zenthangplus\WebScraper;

use DOMDocument;
use Zenthangplus\WebScraper\Contracts\CrawlerResponseInterface;

/**
 * Class ParserAbstraction
 * @package Zenthangplus\WebScraper\Contracts
 */
abstract class ParserAbstraction extends DOMDocument
{
    /**
     * Document's content
     *
     * @var string
     */
    private $content;

    /**
     * ParserAbstraction constructor.
     * @param CrawlerResponseInterface $crawlerResponse
     */
    public function __construct(CrawlerResponseInterface $crawlerResponse)
    {
        // Keep document's content visitable for child classes
        $this->content = $crawlerResponse->getContent();

        // Init DOM Document
        parent::__construct();

        // Load content into DOM
        $this->loadContent();
    }

    /**
     * Load content into DOM document
     *
     * @return mixed
     */
    abstract protected function loadContent();

    /**
     * Get document's content
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
