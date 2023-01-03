<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The SmartTag Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class SmartTag extends Entity
{
    /**
     * <READONLY> SmartTag ID from Sellsy.
     */
    public ?int $id;
    
    /**
     * SmartTag value (label).
     */
    public string $value;
}
