<?php

namespace Bluerock\Sellsy\Entities\Attributes;

use Bluerock\Sellsy\Entities\Address;

/**
 * Addresses Attributes.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
trait Addresses
{
    /**
     * <READONLY> Entity invoicing address ID from Sellsy.
     */
    public ?int $invoicing_address_id;
    
    /**
     * <READONLY> Entity delivery address ID from Sellsy.
     */
    public ?int $delivery_address_id;

    /**
     * <READONLY> Entity invoicing address entity.
     */
    public ?Address $invoicing_address;
    
    /**
     * <READONLY> Entity delivery address entity.
     */
    public ?Address $delivery_address;
}
