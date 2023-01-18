<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Socials;
use Bluerock\Sellsy\Entities\Attributes;
use Bluerock\Sellsy\Entities\Entity;

/**
 * The Contact Entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Contact extends Entity
{
    use Attributes\Acl,
        Attributes\Addresses,
        Attributes\ContactInfos,
        Attributes\SmartTags;

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
