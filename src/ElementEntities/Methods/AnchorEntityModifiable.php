<?php

namespace Zenthangplus\WebScraper\ElementEntities\Methods;

use Zenthangplus\WebScraper\ElementEntities\Properties\AnchorEntityProperties;

/**
 * Trait AnchorEntityModifiable
 * @package Zenthangplus\WebScraper\ElementEntities\Methods
 */
trait AnchorEntityModifiable
{
    use AnchorEntityProperties;

    /**
     * Set link href
     *
     * @param string $href
     */
    public function setHref(string $href)
    {
        $this->href = $href;
    }

    /**
     * Set link title
     *
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Set link target
     *
     * @param string $target
     */
    public function setTarget(string $target)
    {
        $this->target = $target;
    }
}
