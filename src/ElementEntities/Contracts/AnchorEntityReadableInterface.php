<?php

namespace Zenthangplus\WebScraper\ElementEntities\Contracts;

/**
 * Interface AnchorEntityReadableInterface
 * @package Zenthangplus\WebScraper\ElementEntities\Contracts
 */
interface AnchorEntityReadableInterface extends ElementEntityReadableInterface
{
    /**
     * Get link href
     *
     * @return string
     */
    public function getHref(): string;

    /**
     * Get link title
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Get link target
     *
     * @return string
     */
    public function getTarget(): string;
}
