<?php

namespace Zenthangplus\WebScraper\ElementEntities\Contracts;

/**
 * Interface AnchorEntityModifiableInterface
 * @package Zenthangplus\WebScraper\ElementEntities\Contracts
 */
interface AnchorEntityModifiableInterface extends ElementEntityModifiableInterface
{
    /**
     * Set link href
     *
     * @param string $href
     */
    public function setHref(string $href);

    /**
     * Set link title
     *
     * @param string $title
     */
    public function setTitle(string $title);

    /**
     * Set link target
     *
     * @param string $target
     */
    public function setTarget(string $target);
}
