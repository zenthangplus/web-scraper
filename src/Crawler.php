<?php

namespace Zenthangplus\WebScraper;

use Zenthangplus\WebScraper\Contracts\CrawlerResponseInterface;

/**
 * Class Crawler
 * @package Zenthangplus\WebScraper
 */
class Crawler
{
    /**
     * Url to crawl data
     *
     * @var string
     */
    private $url;

    /**
     * User agent for crawler
     *
     * @var string
     */
    private $userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36';

    /**
     * Object will be received response
     *
     * @var CrawlerResponseInterface
     */
    private $response;

    /**
     * Crawler constructor.
     * @param string $url URL to crawl
     * @param CrawlerResponseInterface $response Object will be received response
     */
    public function __construct(string $url, CrawlerResponseInterface $response)
    {
        $this->url = $url;
        $this->response = $response;
    }

    /**
     * Set request user agent
     *
     * @param $ua
     */
    public function setUserAgent(string $ua)
    {
        $this->userAgent = $ua;
    }

    /**
     * Build request options
     *
     * @return array
     */
    private function requestOptions()
    {
        return [
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POST => false,
            CURLOPT_USERAGENT => $this->userAgent,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_AUTOREFERER => true,
            CURLOPT_CONNECTTIMEOUT => 120,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_MAXREDIRS => 10,
        ];
    }

    /**
     * Start crawl data
     */
    public function crawl(): CrawlerResponseInterface
    {
        // Init curl
        $ch = curl_init($this->url);

        // Set request options
        curl_setopt_array($ch, $this->requestOptions());

        // Get response's content
        $content = curl_exec($ch);

        // Check curl error
        if ($error_code = curl_errno($ch)) {
            // Set response's error
            $this->response->setErrorCode($error_code);
            $this->response->setErrorMessage(curl_error($ch));

            // Close Curl
            curl_close($ch);
            return $this->response;
        }

        // Get response's headers
        $headers = curl_getinfo($ch);

        // Get response's content type
        $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

        // Close Curl
        curl_close($ch);

        // Set response's content type
        $this->response->setContentType($contentType);

        // Set response's headers
        $this->response->setHeaders($headers);

        // Set response's content
        $this->response->setContent($content);

        return $this->response;
    }
}
