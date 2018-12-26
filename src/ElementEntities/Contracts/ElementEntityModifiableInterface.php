<?php

namespace Zenthangplus\WebScraper\ElementEntities\Contracts;

/**
 * Interface ElementEntityModifiableInterface
 * @package Zenthangplus\WebScraper\ElementEntities\Contracts
 */
interface ElementEntityModifiableInterface
{
    /**
     * Set element entity
     *
     * @param string $id
     */
    public function setId(string $id): void;

    /**
     * Set element class
     *
     * @param string $class
     */
    public function setClass(string $class): void;

    /**
     * Set element inner content
     *
     * @param string $innerContent
     */
    public function setInnerContent(string $innerContent): void;
}
