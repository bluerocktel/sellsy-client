<?php

namespace Hydrat\Sellsy\Entities;

use Hydrat\Sellsy\Entities\Address;
use Hydrat\Sellsy\Entities\ContactSocials;
use Hydrat\Sellsy\Contracts\EntityContract;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

/**
 * The Contact Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 */
class Contact extends FlexibleDataTransferObject implements EntityContract
{
    /**
     * <READONLY> Contact ID from Sellsy.
     */
    public ?int $id;

    /**
     * Civility of staff.
     * One of ["mr", "mrs", "ms"].
     */
    public ?string $civility;

    /**
     * Contact first name.
     */
    public ?string $first_name;

    /**
     * Contact name.
     */
    public ?string $last_name;

    /**
     * Contact email.
     */
    public ?string $email;
    
    /**
     * Contact website.
     */
    public ?string $website;
    
    /**
     * Contact phone number.
     */
    public ?string $phone_number;
    
    /**
     * Contact mobile number.
     */
    public ?string $mobile_number;
    
    /**
     * Contact fax number.
     */
    public ?string $fax_number;
    
    /**
     * Contact job.
     */
    public ?string $position;
    
    /**
     * Contact birth date.
     */
    public ?string $birth_date;
    
    /**
     * Contact avatar URL.
     */
    public ?string $avatar;
    
    /**
     * Note on contact.
     */
    public string $note = '';
    
    /**
     * Associative array with contact socials.
     */
    public ?ContactSocials $social;
    
    /**
     * Associative array synchronisation to turn on or off.
     */
    public ?ContactSync $sync;
    
    /**
     * Status archived or not.
     */
    public bool $is_archived = false;
    
    /**
     * <READONLY> Contact invoicing address ID from Sellsy.
     */
    public ?int $invoicing_address_id;
    
    /**
     * <READONLY> Contact delivery address ID from Sellsy.
     */
    public ?int $delivery_address_id;

    /**
     * <READONLY> Contact invoicing address.
     */
    public ?Address $invoicing_address;
    
    /**
     * <READONLY> Contact delivery address.
     */
    public ?Address $delivery_address;
    
    /**
     * <READONLY> Contact creates date from Sellsy.
     */
    public ?string $created;
    
    /**
     * <READONLY> Contact updated date from Sellsy.
     */
    public ?array $owner;
}
