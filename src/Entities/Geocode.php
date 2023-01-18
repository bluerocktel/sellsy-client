<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The Geocode Entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Geocode extends Entity
{
    /**
     * Geocode latitude.
     *
     * @var int|float|null
     */
    public $lat;

    /**
     * Geocode longitude.
     *
     * @var int|float|null
     */
    public $lng;
}
