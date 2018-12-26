<?php

namespace Zenthangplus\ElementEntities;

use Zenthangplus\WebScraper\ElementEntities\Contracts\AnchorEntityReadableInterface;
use Zenthangplus\WebScraper\ElementEntities\Contracts\AnchorEntityModifiableInterface;
use Zenthangplus\WebScraper\ElementEntities\Properties\AnchorEntityProperties;
use Zenthangplus\WebScraper\ElementEntities\Methods\AnchorEntityReadable;
use Zenthangplus\WebScraper\ElementEntities\Methods\AnchorEntityModifiable;
use Zenthangplus\WebScraper\ElementEntities\Methods\ElementEntityReadable;
use Zenthangplus\WebScraper\ElementEntities\Methods\ElementEntityModifiable;

/**
 * Class AnchorEntity
 * @package Zenthangplus\ElementEntities
 */
class AnchorEntity extends ElementEntity implements AnchorEntityModifiableInterface, AnchorEntityReadableInterface
{
    use AnchorEntityProperties,
        ElementEntityModifiable, ElementEntityReadable,
        AnchorEntityModifiable, AnchorEntityReadable;
}
