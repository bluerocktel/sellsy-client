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
class Tax extends Entity
{
    /**
     * <READONLY> Tax class ID from Sellsy.
     */
    public int $id;
    
    /**
     * Tax rate in percentage.
     *
     * @var int|float|null
     */
    public $rate;
    
    /**
     * Tax class label.
     */
    public ?string $label;
}
