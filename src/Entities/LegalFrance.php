<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The Geocode Entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class LegalFrance extends Entity
{
    /**
     * The company siret number.
     * Lenght 14 chars.
     */
    public ?string $siret;
    
    /**
     * The company siren number.
     * Lenght 9 chars.
     */
    public ?string $siren;
    
    /**
     * The company VAT number.
     * Lenght 2-15 chars.
     */
    public ?string $vat;
    
    /**
     * The company APE/NAF Code.
     * Lenght 5 chars.
     */
    public ?string $ape_naf_code;
    
    /**
     * The company type.
     * Lenght 2-100 chars.
     */
    public ?string $company_type;
    
    /**
     * The company RCS immatriculation code.
     * Lenght 3-200 chars.
     */
    public ?string $rcs_immatriculation;
}
