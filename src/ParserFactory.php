<?php

namespace Zenthangplus\WebScraper;

use Zenthangplus\WebScraper\Contracts\CrawlerResponseInterface;
use Zenthangplus\WebScraper\Exceptions\ContentTypeException;
use Zenthangplus\WebScraper\Parsers\HtmlParser;
use Zenthangplus\WebScraper\Parsers\XmlParser;

/**
 * Class ParserFactory
 * @package Zenthangplus\WebScraper
 */
class ParserFactory
{
    /**
     * @var CrawlerResponseInterface
     */
    private $crawlerResponse;

    /**
     * ParserFactory constructor.
     * @param CrawlerResponseInterface $crawlerResponse
     */
    public function __construct(CrawlerResponseInterface $crawlerResponse)
    {
        $this->crawlerResponse = $crawlerResponse;
    }

    /**
     * @return ParserAbstraction
     * @throws ContentTypeException
     */
    public function toParser()
    {
        $contentType = $this->crawlerResponse->getContentType();

        // Check if content type is HTML
        if (strpos($contentType, 'text/html') !== false) {
            return new HtmlParser($this->crawlerResponse);
        }

        // Check if content type is XML
        if (strpos($contentType, 'text/xml') !== false) {
            return new XmlParser($this->crawlerResponse);
        }

        // Throw error
        throw new ContentTypeException(
            sprintf("Couldn't parse this content type (%s).", $this->crawlerResponse->getContentType())
        );
    }

    /**
     * Make new parser from crawler's response
     *
     * @param CrawlerResponseInterface $response
     * @return ParserAbstraction
     * @throws ContentTypeException
     */
    public static function make(CrawlerResponseInterface $response)
    {
        $factory = new self($response);
        return $factory->toParser();
    }
}
