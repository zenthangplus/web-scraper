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
     * @var int
     */
    private $error_code;

    /**
     * @var string
     */
    private $error_message;

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
     * Check if response is error
     *
     * @return bool
     */
    public function isError(): bool
    {
        return $this->error_code != 0;
    }

    /**
     * Get error code
     *
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->error_code;
    }

    /**
     * Set error code
     *
     * @param int $error_code
     */
    public function setErrorCode(int $error_code)
    {
        $this->error_code = $error_code;
    }

    /**
     * Get error message
     *
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->error_message;
    }

    /**
     * Set error message
     *
     * @param string $error_message
     */
    public function setErrorMessage(string $error_message)
    {
        $this->error_message = $error_message;
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
