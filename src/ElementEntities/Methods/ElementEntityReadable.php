<?php

namespace Zenthangplus\WebScraper\ElementEntities\Methods;

use Zenthangplus\WebScraper\ElementEntities\Properties\ElementEntityProperties;

/**
 * Trait ElementEntityReadable
 * @package Zenthangplus\WebScraper\ElementEntities\Methods
 */
trait ElementEntityReadable
{
    use ElementEntityProperties;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get element class
     *
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * Get element inner content
     *
     * @return string
     */
    public function getInnerContent(): string
    {
        return $this->innerContent;
    }
}
