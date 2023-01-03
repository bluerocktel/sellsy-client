<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Contact;
use Bluerock\Sellsy\Entities\Attributes;
use Bluerock\Sellsy\Contracts\EntityContract;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

/**
 * The Individual Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 */
class Individual extends FlexibleDataTransferObject implements EntityContract
{
    use Attributes\Acl,
        Attributes\Statistics,
        Attributes\Addresses,
        Attributes\ContactInfos,
        Attributes\SmartTags;
    
    /**
     * <READONLY> Individual ID from Sellsy.
     */
    public ?int $id;
    
    /**
     * Individual last name.
     */
    public string $last_name;

    /**
     * Individual first name.
     */
    public string $first_name;
    
    /**
     * Individual type.
     * May be client, prospect..
     */
    public ?string $type;
    
    /**
     * Individual reference.
     */
    public ?string $reference;
    
    /**
     * Note on company.
     */
    public string $note = '';

    /**
     * Individual auxiliary code.
     */
    public ?string $auxiliary_code;
    
    /**
     * Individual socials.
     */
    public ?Socials $social;
    
    /**
     * Individual rate category id.
     */
    public ?int $rate_category_id;
    
    /**
     * Individual accounting code id.
     */
    public ?int $accounting_code_id;
    
    /**
     * Individual accounting purchase code id.
     */
    public ?int $accounting_purchase_code_id;
    
    /**
     * Status archived or not.
     */
    public bool $is_archived = false;
    
    /**
     * <READONLY> Individual main contact ID from Sellsy.
     */
    public ?int $main_contact_id;
    
    /**
     * <READONLY> Individual main dunning ID from Sellsy.
     */
    public ?int $dunning_contact_id;
    
    /**
     * <READONLY> Individual invoicing contact ID from Sellsy.
     */
    public ?int $invoicing_contact_id;

    /**
     * <READONLY> Individual main contact entity.
     */
    public ?Contact $main_contact;

    /**
     * <READONLY> Individual dunning contact entity.
     */
    public ?Contact $dunning_contact;

    /**
     * <READONLY> Individual invoicing contact entity.
     */
    public ?Contact $invoicing_contact;
    
    /**
     * <READONLY> Individual creates date from Sellsy.
     */
    public ?string $created;
    
    /**
     * <READONLY> Individual owner from Sellsy.
     */
    public ?array $owner;
}
