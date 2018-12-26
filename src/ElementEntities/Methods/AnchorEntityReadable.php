<?php

namespace Zenthangplus\WebScraper\ElementEntities\Methods;

use Zenthangplus\WebScraper\ElementEntities\Properties\AnchorEntityProperties;

/**
 * Trait AnchorEntityReadable
 * @package Zenthangplus\WebScraper\ElementEntities\Methods
 */
trait AnchorEntityReadable
{
    use AnchorEntityProperties;

    /**
     * Get link href
     *
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * Get link title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get link target
     *
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }
}
