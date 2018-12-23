<?php

namespace Tests\Parsers;

use PHPUnit\Framework\TestCase;
use Tests\Traits\InvokeInaccessible;
use Zenthangplus\WebScraper\CrawlerResponse;
use Zenthangplus\WebScraper\Parsers\HtmlParser;

/**
 * Class CrawlerResponseTest
 * @package Tests
 * @covers \Zenthangplus\WebScraper\Parsers\HtmlParser
 */
class HtmlParserTest extends TestCase
{
    use InvokeInaccessible;

    /**
     * Parser object
     *
     * @var HtmlParser
     */
    private $parser;

    /**
     * Example content
     *
     * @var string
     */
    private $content = '<div id="element">test-element-content</div>';

    /**
     * Setup unit tests
     */
    protected function setUp()
    {
        $crawlerResponse = new CrawlerResponse();
        $crawlerResponse->setContent($this->content);
        $this->parser = new HtmlParser($crawlerResponse);
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
     * @covers \Zenthangplus\WebScraper\Parsers\HtmlParser::loadContent
     */
    public function testLoadContentExactly()
    {
        $this->assertEquals(
            'test-element-content',
            $this->parser->getDom()->getElementById('element')->textContent
        );
    }

    /**
     * Test dom is DOM object
     *
     * @covers \Zenthangplus\WebScraper\Parsers\HtmlParser::getDom
     */
    public function testGetDom()
    {
        $this->assertInstanceOf(\DOMDocument::class, $this->parser->getDom());
    }

    /**
     * Test get content which provided by CrawlerResponse
     *
     * @covers \Zenthangplus\WebScraper\Parsers\HtmlParser::getContent
     */
    public function testGetContent()
    {
        $this->assertEquals($this->content, $this->parser->getContent());
    }
}
