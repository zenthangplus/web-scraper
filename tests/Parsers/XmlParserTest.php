<?php

namespace Tests\Parsers;

use PHPUnit\Framework\TestCase;
use Tests\Traits\InvokeInaccessible;
use Zenthangplus\WebScraper\CrawlerResponse;
use Zenthangplus\WebScraper\Parsers\XmlParser;

/**
 * Class CrawlerResponseTest
 * @package Tests
 * @covers \Zenthangplus\WebScraper\Parsers\XmlParser
 */
class XmlParserTest extends TestCase
{
    use InvokeInaccessible;

    /**
     * Parser object
     *
     * @var XmlParser
     */
    private $parser;

    /**
     * Example content
     *
     * @var string
     */
    private $content = '<?xml version="1.0" encoding="UTF-8"?><testNode>test-node-content</testNode>';

    /**
     * Setup unit tests
     */
    protected function setUp()
    {
        $crawlerResponse = new CrawlerResponse();
        $crawlerResponse->setContent($this->content);
        $this->parser = new XmlParser($crawlerResponse);
    }

    /**
     * Destroy variables when test succeed
     */
    protected function tearDown()
    {
        unset($this->parser);
    }

    /**
     * Test loadContent method working exactly
     *
     * @covers \Zenthangplus\WebScraper\Parsers\XmlParser::loadContent
     */
    public function testLoadContentExactly()
    {
        $this->assertEquals(
            'test-node-content',
            $this->parser->getDom()->getElementsByTagName('testNode')->item(0)->textContent
        );
    }

    /**
     * Test dom is DOM object
     *
     * @covers \Zenthangplus\WebScraper\Parsers\XmlParser::getDom
     */
    public function testGetDom()
    {
        $this->assertInstanceOf(\DOMDocument::class, $this->parser->getDom());
    }

    /**
     * Test get content which provided by CrawlerResponse
     *
     * @covers \Zenthangplus\WebScraper\Parsers\XmlParser::getContent
     */
    public function testGetContent()
    {
        $this->assertEquals($this->content, $this->parser->getContent());
    }
}
