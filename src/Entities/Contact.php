<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Address;
use Bluerock\Sellsy\Entities\Socials;
use Bluerock\Sellsy\Entities\Attributes\Acl;
use Bluerock\Sellsy\Contracts\EntityContract;
use Bluerock\Sellsy\Entities\Attributes\Addresses;
use Bluerock\Sellsy\Entities\Attributes\ContactInfos;
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
    use Acl,
        Addresses,
        ContactInfos;

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
     * Contact socials.
     */
    public ?Socials $social;
    
    /**
     * Contact synchronisation to turn on or off.
     */
    public ?ContactSync $sync;
    
    /**
     * Status archived or not.
     */
    public bool $is_archived = false;
    
    /**
     * <READONLY> Contact creates date from Sellsy.
     */
    public ?string $created;
    
    /**
     * <READONLY> Contact owner from Sellsy.
     */
    public ?array $owner;
}
