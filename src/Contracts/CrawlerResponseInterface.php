<?php

namespace Zenthangplus\WebScraper\Contracts;

/**
 * Interface CrawlerResponseInterface
 * @package Zenthangplus\WebScraper\Contracts
 */
interface CrawlerResponseInterface
{
    /**
     * Get response's url
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * Set response's url
     *
     * @param string $url
     */
    public function setUrl(string $url);

    /**
     * Check if response is error
     *
     * @return bool
     */
    public function isError(): bool;

    /**
     * Get error code
     *
     * @return int
     */
    public function getErrorCode(): int;

    /**
     * Set error code
     *
     * @param int $error_code
     */
    public function setErrorCode(int $error_code);

    /**
     * Get error message
     *
     * @return string
     */
    public function getErrorMessage(): string;

    /**
     * Set error message
     *
     * @param string $error_message
     */
    public function setErrorMessage(string $error_message);

    /**
     * Get response's content type
     *
     * @return string
     */
    public function getContentType() :string;

    /**
     * Set response's content type
     *
     * @param string $contentType
     */
    public function setContentType(string $contentType);

    /**
     * Get a response's header by key
     *
     * @param string $key
     * @return string
     */
    public function getHeader(string $key): string;

    /**
     * Get response's headers
     *
     * @return array
     */
    public function getHeaders(): array;

    /**
     * Set response's headers
     *
     * @param array $headers
     */
    public function setHeaders(array $headers);

    /**
     * Get response's content
     *
     * @return string
     */
    public function getContent(): string;

    /**
     * Set response's content
     *
     * @param string $content
     */
    public function setContent(string $content);
}
