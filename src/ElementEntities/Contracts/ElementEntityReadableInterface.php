<?php

namespace Zenthangplus\WebScraper\ElementEntities\Contracts;

/**
 * Interface ElementEntityReadableInterface
 * @package Zenthangplus\WebScraper\ElementEntities\Contracts
 */
interface ElementEntityReadableInterface
{
    /**
     * Get element ID
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Get element class
     *
     * @return string
     */
    public function getClass(): string;

    /**
     * Get element inner content
     *
     * @return string
     */
    public function getInnerContent(): string;
}
