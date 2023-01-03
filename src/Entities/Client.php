<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Contact;
use Bluerock\Sellsy\Entities\Attributes;
use Bluerock\Sellsy\Entities\Entity;

/**
 * The Client Entity.
 * Abstract type containing shared attributes between Company and Individual.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 */
abstract class Client extends Entity
{
    use Attributes\Acl,
        Attributes\Statistics,
        Attributes\Addresses,
        Attributes\ContactInfos,
        Attributes\SmartTags;
    
    /**
     * <READONLY> Client ID from Sellsy.
     */
    public ?int $id;
    
    /**
     * Client type.
     * May be client, prospect..
     */
    public ?string $type;
    
    /**
     * Client reference.
     */
    public ?string $reference;
    
    /**
     * Note on client.
     */
    public string $note = '';

    /**
     * Client auxiliary code.
     */
    public ?string $auxiliary_code;
    
    /**
     * Client socials.
     */
    public ?Socials $social;
    
    /**
     * Client rate category id.
     */
    public ?int $rate_category_id;
    
    /**
     * Client accounting code id.
     */
    public ?int $accounting_code_id;
    
    /**
     * Client accounting purchase code id.
     */
    public ?int $accounting_purchase_code_id;
    
    /**
     * Status archived or not.
     */
    public bool $is_archived = false;
    
    /**
     * <READONLY> Client main contact ID from Sellsy.
     */
    public ?int $main_contact_id;
    
    /**
     * <READONLY> Client main dunning ID from Sellsy.
     */
    public ?int $dunning_contact_id;
    
    /**
     * <READONLY> Client invoicing contact ID from Sellsy.
     */
    public ?int $invoicing_contact_id;

    /**
     * <READONLY> Client main contact entity.
     */
    public ?Contact $main_contact;

    /**
     * <READONLY> Client dunning contact entity.
     */
    public ?Contact $dunning_contact;

    /**
     * <READONLY> Client invoicing contact entity.
     */
    public ?Contact $invoicing_contact;
    
    /**
     * <READONLY> Client creates date from Sellsy.
     */
    public ?string $created;
    
    /**
     * <READONLY> Client owner from Sellsy.
     */
    public ?array $owner;
}
