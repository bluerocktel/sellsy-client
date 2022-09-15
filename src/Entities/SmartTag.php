<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Contracts\EntityContract;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

/**
 * The SmartTag Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class SmartTag extends FlexibleDataTransferObject implements EntityContract
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
