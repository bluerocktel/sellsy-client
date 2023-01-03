<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The Tax Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Unit extends Entity
{
    /**
     * <READONLY> Tax class ID from Sellsy.
     */
    public int $id;
    
    /**
     * Tax class label.
     */
    public ?string $label;
}
