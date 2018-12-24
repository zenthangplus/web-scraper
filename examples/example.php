<?php
require_once __DIR__ . '/../vendor/autoload.php';

$url = 'https://google.com/';
try {
    // Init crawler
    $crawler = new \Zenthangplus\WebScraper\Crawler($url, new \Zenthangplus\WebScraper\CrawlerResponse());
    $response = $crawler->crawl();

    // Init parser
    $parser = \Zenthangplus\WebScraper\ParserFactory::make($response);

    // Test get page title
    $pageTitle = $parser->getElementsByTagName('title')->item(0)->textContent;
    echo 'Loaded page title: ' . $pageTitle . "\n";
}
catch (\Zenthangplus\WebScraper\Exceptions\RequestException $ex) {
    echo 'Crawler error: ' . $ex->getMessage() . "\n";
}
catch (\Zenthangplus\WebScraper\Exceptions\ContentTypeException $ex) {
    echo 'Content type error: ' . $ex->getMessage() . "\n";
}
catch (\Zenthangplus\WebScraper\Exceptions\ParserException $ex) {
    echo 'Parser error: ' . $ex->getMessage() . "\n";
}
