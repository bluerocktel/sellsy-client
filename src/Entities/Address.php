<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Geocode;
use Bluerock\Sellsy\Entities\Entity;

/**
 * The Address Entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Address extends Entity
{
    /**
     * <READONLY> Address ID from Sellsy.
     */
    public ?int $id;

    /**
     * Address name.
     */
    public ?string $name;

    /**
     * Address line 1
     */
    public ?string $address_line_1;
    
    /**
     * Address line 2
     */
    public ?string $address_line_2;
    
    /**
     * Address line 3
     */
    public ?string $address_line_3;
    
    /**
     * Address line 4
     */
    public ?string $address_line_4;

    /**
     * Address postal code.
     */
    public ?string $postal_code;
    
    /**
     * Address city.
     * e.g: Paris
     */
    public ?string $city;
    
    /**
     * Address country.
     * e.g: France
     */
    public ?string $country;
    
    /**
     * Address country_code.
     * e.g: FR
     */
    public ?string $country_code;
   
    /**
     * Weither the address is used as invoicing address or not.
     */
    public bool $is_invoicing_address;
    
    /**
     * Weither the address is used as delivery address or not.
     */
    public bool $is_delivery_address;

    /**
     * Address Georcoding
     */
    public ?Geocode $geocode;
}
