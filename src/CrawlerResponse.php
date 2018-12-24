<?php

namespace Zenthangplus\WebScraper;

use Zenthangplus\WebScraper\Contracts\CrawlerResponseInterface;

/**
 * Class CrawlerResponse
 * @package Zenthangplus\WebScraper
 */
class CrawlerResponse implements CrawlerResponseInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var string
     */
    private $content_type;

    /**
     * @var string
     */
    private $content;

    /**
     * Get response's url
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Set response's url
     *
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * Get response's content type
     *
     * @return string
     */
    public function getContentType(): string
    {
        return $this->content_type;
    }

    /**
     * Set response's content type
     *
     * @param string $contentType
     */
    public function setContentType(string $contentType)
    {
        $this->content_type = $contentType;
    }

    /**
     * Get a response's header by key
     *
     * @param string $key
     * @return string
     */
    public function getHeader(string $key): string
    {
        return isset($this->headers[$key]) ? $this->headers[$key] : '';
    }

    /**
     * Get response's headers
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Set response's headers
     *
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * Get response's content
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set response's content
     *
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }
}
