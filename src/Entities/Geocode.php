<?php

namespace Hydrat\Sellsy\Entities;

use Hydrat\Sellsy\Contracts\EntityContract;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

/**
 * The Geocode Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 */
class Geocode extends FlexibleDataTransferObject implements EntityContract
{
    /**
     * Geocode latitude.
     */
    public ?float $lat;

    /**
     * Geocode longitude.
     */
    public ?float $lng;
}
