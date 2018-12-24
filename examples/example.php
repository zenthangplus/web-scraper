<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Zenthangplus\WebScraper\Crawler;
use Zenthangplus\WebScraper\CrawlerResponse;
use Zenthangplus\WebScraper\ParserFactory;
use Zenthangplus\WebScraper\Exceptions\RequestException;
use Zenthangplus\WebScraper\Exceptions\ParserException;
use Zenthangplus\WebScraper\Exceptions\ContentTypeException;

$url = 'https://google.com/';

try {
    // Init crawler
    $crawler = new Crawler($url, new CrawlerResponse);
    $response = $crawler->crawl();

    // Init parser
    $parser = ParserFactory::make($response);

    // Test get page title
    $pageTitle = $parser->getElementsByTagName('title')->item(0)->textContent;
    echo 'Loaded page title: ' . $pageTitle . "\n";
}
catch (RequestException $ex) {
    echo 'Crawler error: ' . $ex->getMessage() . "\n";
}
catch (ContentTypeException $ex) {
    echo 'Content type error: ' . $ex->getMessage() . "\n";
}
catch (ParserException $ex) {
    echo 'Parser error: ' . $ex->getMessage() . "\n";
}
