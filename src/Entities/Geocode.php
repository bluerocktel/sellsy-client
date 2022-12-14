<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Contracts\EntityContract;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

/**
 * The Geocode Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Geocode extends FlexibleDataTransferObject implements EntityContract
{
    /**
     * Geocode latitude.
     *
     * @var int|float
     */
    public $lat;

    /**
     * Geocode longitude.
     *
     * @var int|float
     */
    public $lng;
}
