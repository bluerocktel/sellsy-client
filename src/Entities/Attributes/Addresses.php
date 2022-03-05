<?php

namespace Bluerock\Sellsy\Entities\Attributes;

use Bluerock\Sellsy\Entities\Address;

/**
 * Addresses Attributes.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 */
trait Addresses
{
    /**
     * <READONLY> Company invoicing address ID from Sellsy.
     */
    public ?int $invoicing_address_id;
    
    /**
     * <READONLY> Company delivery address ID from Sellsy.
     */
    public ?int $delivery_address_id;

    /**
     * <READONLY> Company invoicing address entity.
     */
    public ?Address $invoicing_address;
    
    /**
     * <READONLY> Company delivery address entity.
     */
    public ?Address $delivery_address;
}
