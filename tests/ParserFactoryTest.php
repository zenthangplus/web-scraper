<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Zenthangplus\WebScraper\CrawlerResponse;
use Zenthangplus\WebScraper\Exceptions\ContentTypeException;
use Zenthangplus\WebScraper\ParserFactory;
use Zenthangplus\WebScraper\Parsers\HtmlParser;
use Zenthangplus\WebScraper\Parsers\XmlParser;

/**
 * Class CrawlerTest
 * @package Tests
 * @covers \Zenthangplus\WebScraper\ParserFactory
 */
class ParserFactoryTest extends TestCase
{
    /**
     * Test parser factory return HtmlParser exactly
     *
     * @covers \Zenthangplus\WebScraper\ParserFactory::make
     * @covers \Zenthangplus\WebScraper\ParserFactory::toParser
     *
     * @throws \Zenthangplus\WebScraper\Exceptions\ContentTypeException
     */
    public function testReturnHtmlParser()
    {
        $crawlerResponse = new CrawlerResponse;
        $crawlerResponse->setContentType('text/html; charset UTF-8');
        $crawlerResponse->setContent('<b>test-content</b>');
        $parser = ParserFactory::make($crawlerResponse);
        $this->assertInstanceOf(HtmlParser::class, $parser);
    }

    /**
     * Test parser factory return XmlParser exactly
     *
     * @covers \Zenthangplus\WebScraper\ParserFactory::make
     * @covers \Zenthangplus\WebScraper\ParserFactory::toParser
     *
     * @throws \Zenthangplus\WebScraper\Exceptions\ContentTypeException
     */
    public function testReturnXmlParser()
    {
        $crawlerResponse = new CrawlerResponse;
        $crawlerResponse->setContentType('text/xml');
        $crawlerResponse->setContent('<node>test-content</node>');
        $parser = ParserFactory::make($crawlerResponse);
        $this->assertInstanceOf(XmlParser::class, $parser);
    }

    /**
     * Test parser factory throw exception about content type
     *
     * @covers \Zenthangplus\WebScraper\ParserFactory::make
     * @covers \Zenthangplus\WebScraper\ParserFactory::toParser
     *
     * @throws \Zenthangplus\WebScraper\Exceptions\ContentTypeException
     */
    public function testThrowExceptionContentType()
    {
        $this->expectException(ContentTypeException::class);
        $crawlerResponse = new CrawlerResponse;
        $crawlerResponse->setContentType('an-error-content-type');
        $crawlerResponse->setContent('test-content');
        ParserFactory::make($crawlerResponse);
    }
}
