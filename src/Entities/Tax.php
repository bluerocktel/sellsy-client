<?php

namespace Hydrat\Sellsy\Entities;

use Hydrat\Sellsy\Contracts\EntityContract;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

/**
 * The Tax Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 */
class Tax extends FlexibleDataTransferObject implements EntityContract
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
