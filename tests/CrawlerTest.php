<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Tests\Traits\InvokeInaccessible;
use Zenthangplus\WebScraper\Crawler;
use Zenthangplus\WebScraper\CrawlerResponse;
use Zenthangplus\WebScraper\Contracts\CrawlerResponseInterface;
use Zenthangplus\WebScraper\Exceptions\RequestException;

/**
 * Class CrawlerTest
 * @package Tests
 * @covers \Zenthangplus\WebScraper\Crawler
 */
class CrawlerTest extends TestCase
{
    use InvokeInaccessible;

    /**
     * URL to test
     *
     * @var string
     */
    private $url = 'https://google.com/';

    /**
     * Crawler object
     *
     * @var Crawler
     */
    private $crawler;

    /**
     * Setup unit tests
     */
    protected function setUp()
    {
        $this->crawler = new Crawler($this->url, new CrawlerResponse);
    }

    /**
     * Destroy all variables
     */
    protected function tearDown()
    {
        unset($this->url);
        unset($this->crawler);
    }

    /**
     * Test method crawl throw request exception
     *
     * @throws RequestException
     */
    public function testCrawlerThrowRequestException()
    {
        $this->expectException(RequestException::class);
        $crawler = new Crawler('http://abc', new CrawlerResponse);
        $crawler->crawl();
    }

    /**
     * Test get & set url
     *
     * @covers \Zenthangplus\WebScraper\Crawler::__construct
     *
     * @throws \ReflectionException
     */
    public function testGetSetUrl()
    {
        $this->assertEquals($this->url, $this->invokeProperty($this->crawler, 'url'));
    }

    /**
     * Test get & set user agent
     *
     * @covers \Zenthangplus\WebScraper\Crawler::setUserAgent
     *
     * @throws \ReflectionException
     */
    public function testGetSetUserAgent()
    {
        $userAgent = 'test-user-agent';
        $this->crawler->setUserAgent($userAgent);
        $this->assertEquals($userAgent, $this->invokeProperty($this->crawler, 'userAgent'));
    }

    /**
     * Test requestOptions method
     *
     * @covers \Zenthangplus\WebScraper\Crawler::requestOptions
     *
     * @throws \ReflectionException
     */
    public function testRequestOptions()
    {
        $this->assertTrue(is_array($this->invokeMethod($this->crawler, 'requestOptions')));
    }

    /**
     * Test crawl method respond exactly
     *
     * @covers \Zenthangplus\WebScraper\Crawler::crawl
     *
     * @throws RequestException
     */
    public function testCrawlRespondExactly()
    {
        $response = $this->crawler->crawl();
        $this->assertInstanceOf(CrawlerResponseInterface::class, $response);
    }

    /**
     * Test content type which returned by crawler
     *
     * @covers \Zenthangplus\WebScraper\Crawler::crawl
     *
     * @throws RequestException
     */
    public function testCrawlContentType()
    {
        $response = $this->crawler->crawl();
        $this->assertStringStartsWith("text/html", $response->getContentType());
    }

    /**
     * Test headers data which returned by crawler
     *
     * @covers \Zenthangplus\WebScraper\Crawler::crawl
     *
     * @throws RequestException
     */
    public function testCrawlHeaders()
    {
        $response = $this->crawler->crawl();
        $this->assertTrue(is_array($response->getHeaders()));
    }

    /**
     * Test content data which returned by crawler
     *
     * @throws RequestException
     */
    public function testCrawlContent()
    {
        $response = $this->crawler->crawl();
        $this->assertTrue(strlen($response->getContent()) > 0);
    }
}
