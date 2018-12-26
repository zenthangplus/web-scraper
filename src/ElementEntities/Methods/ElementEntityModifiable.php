<?php

namespace Zenthangplus\WebScraper\ElementEntities\Methods;

use Zenthangplus\WebScraper\ElementEntities\Properties\ElementEntityProperties;

/**
 * Trait ElementEntityModifiable
 * @package Zenthangplus\WebScraper\ElementEntities\Methods
 */
trait ElementEntityModifiable
{
    use ElementEntityProperties;

    /**
     * Set element ID
     *
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Set element class
     *
     * @param string $class
     */
    public function setClass(string $class)
    {
        $this->class = $class;
    }

    /**
     * Set element inner content
     *
     * @param string $innerContent
     */
    public function setInnerContent(string $innerContent)
    {
        $this->innerContent = $innerContent;
    }
}
