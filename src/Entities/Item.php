<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;
use Bluerock\Sellsy\Entities\Tax;
use Bluerock\Sellsy\Entities\Unit;

/**
 * The Item Entity.
 *
 * @package bluerock/sellsy-client
 * @author Cédric <cedric@websenso.com>
 * @version 1.0
 * @access public
 */
class Item extends Entity
{
    /**
     * <READONLY> Item ID from Sellsy.
     */
    public ?int $id;

    /**
     * Item type
     * One of ["product", "service"].
     */
    public ?string $type;

    /**
     * Item name.
     */
    public ?string $name;

    /**
     * Item reference.
     */
    public ?string $reference;
    
    /**
     * Item reference price.
     */
    public ?string $reference_price;
    
    /**
     * Item price excl tax.
     */
    public ?string $price_excl_tax;
    
    /**
     * Item reference price tax inc.
     */
    public ?string $reference_price_taxes_inc;
    
    /**
     * Item reference price tax exc.
     */
    public ?string $reference_price_taxes_exc;
    
    /**
     * Is taxes free.
     */
    public ?bool $is_reference_price_taxes_free;
    
    /**
     * Tax.
     */
    public ?Tax $tax;
    
    /**
     * Unit.
     */
    public ?Unit $unit;
    
    /**
     * Item currency.
     */
    public string $currency = 'EUR';

    /**
     * Item standard quantity.
     */
    public ?string $standard_quantity;
    
    /**
     * Item description.
     */
    public ?string $description;
    
    /**
     * Is name included in description
     */
    public ?bool $is_name_included_in_description;
}
