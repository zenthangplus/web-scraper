<?php

namespace Zenthangplus\WebScraper;

use DOMDocument;
use Zenthangplus\WebScraper\Contracts\CrawlerResponseInterface;
use Zenthangplus\WebScraper\Exceptions\ParserException;

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
     * @throws ParserException
     */
    public function __construct(CrawlerResponseInterface $crawlerResponse)
    {
        // Keep document's content visitable for child classes
        $this->content = $crawlerResponse->getContent();

        // Init DOM Document
        parent::__construct();

        // Load content into DOM
        if (!$this->loadContent()) {
            throw new ParserException("Couldn't parse this document.");
        }
    }

    /**
     * Load content into DOM document
     *
     * @return mixed
     */
    abstract protected function loadContent(): bool;

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
