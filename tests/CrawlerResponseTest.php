<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Zenthangplus\WebScraper\Contracts\CrawlerResponseInterface;
use Zenthangplus\WebScraper\CrawlerResponse;

/**
 * Class CrawlerResponseTest
 * @package Tests
 * @covers \Zenthangplus\WebScraper\CrawlerResponse
 */
class CrawlerResponseTest extends TestCase
{
    /**
     * @var CrawlerResponse
     */
    public $response;

    /**
     * Setup the test
     */
    protected function setUp()
    {
        $this->response = new CrawlerResponse();
    }

    /**
     * Destroy data after test completed
     */
    protected function tearDown()
    {
        unset($this->response);
    }

    /**
     * Test check class implemented contract.
     */
    public function testImplementedContact()
    {
        $this->assertInstanceOf(CrawlerResponseInterface::class, $this->response);
    }

    /**
     * Test get & set url
     *
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::getUrl
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::setUrl
     */
    public function testGetSetUrl()
    {
        $url = 'https://google.com/';
        $this->response->setUrl($url);
        $this->assertEquals($url, $this->response->getUrl());
    }

    /**
     * Test get & set content type
     *
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::getContentType
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::setContentType
     */
    public function testGetSetContentType()
    {
        $contentType = 'text/html';
        $this->response->setContentType($contentType);
        $this->assertEquals($contentType, $this->response->getContentType());
    }

    /**
     * Test get & set headers
     *
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::getHeaders
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::setHeaders
     */
    public function testGetSetHeaders()
    {
        $headers = ['header-1' => 'value-1', 'header-2' => 'value-2'];
        $this->response->setHeaders($headers);
        $this->assertEquals($headers, $this->response->getHeaders());
    }

    /**
     * Test get specific header
     *
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::getHeader
     */
    public function testGetSpecificHeader()
    {
        $headers = ['header-1' => 'value-1', 'header-2' => 'value-2'];
        $this->response->setHeaders($headers);
        $header = $this->response->getHeader('header-2');
        $this->assertEquals('value-2', $header);
    }

    /**
     * Test get & set content
     *
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::getContent
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::setContent
     */
    public function testGetSetContent()
    {
        $content = 'test-content';
        $this->response->setContent($content);
        $this->assertEquals($content, $this->response->getContent());
    }

    /**
     * Test get & set error code
     *
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::getErrorCode
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::setErrorCode
     */
    public function testGetSetErrorCode()
    {
        $error_code = 1;
        $this->response->setErrorCode($error_code);
        $this->assertEquals($error_code, $this->response->getErrorCode());
    }

    /**
     * Test get & set error message
     *
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::getErrorMessage
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::setErrorMessage
     */
    public function testGetSetErrorMessage()
    {
        $error_msg = "test-message";
        $this->response->setErrorMessage($error_msg);
        $this->assertEquals($error_msg, $this->response->getErrorMessage());
    }

    /**
     * Test isError is true
     *
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::isError
     */
    public function testIsErrorIsTrue()
    {
        $this->response->setErrorCode(2);
        $this->assertTrue($this->response->isError());
    }

    /**
     * Test isError is false
     *
     * @covers \Zenthangplus\WebScraper\CrawlerResponse::isError
     */
    public function testIsErrorIsFalse()
    {
        $this->response->setErrorCode(0);
        $this->assertFalse($this->response->isError());
    }
}
