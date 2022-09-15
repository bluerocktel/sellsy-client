<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Contact;
use Bluerock\Sellsy\Entities\Attributes;
use Bluerock\Sellsy\Contracts\EntityContract;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

/**
 * The Company Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Company extends FlexibleDataTransferObject implements EntityContract
{
    use Attributes\Acl,
        Attributes\Statistics,
        Attributes\Addresses,
        Attributes\ContactInfos,
        Attributes\SmartTags;
    
    /**
     * <READONLY> Company ID from Sellsy.
     */
    public ?int $id;

    /**
     * Company name.
     */
    public string $name;
    
    /**
     * Company Legal infomation (france format).
     */
    public LegalFrance $legal_france;
    
    /**
     * Company type.
     * May be client, prospect..
     */
    public ?string $type;

    /**
     * Company capital.
     */
    public ?string $capital;
    
    /**
     * Company reference.
     */
    public ?string $reference;
    
    /**
     * Note on company.
     */
    public string $note = '';

    /**
     * Company auxiliary code.
     */
    public ?string $auxiliary_code;
    
    /**
     * Company socials.
     */
    public ?Socials $social;
    
    /**
     * Company rate category id.
     */
    public ?int $rate_category_id;
    
    /**
     * Company accounting code id.
     */
    public ?int $accounting_code_id;
    
    /**
     * Company accounting purchase code id.
     */
    public ?int $accounting_purchase_code_id;
    
    /**
     * Status archived or not.
     */
    public bool $is_archived = false;

    /**
     * Company business segment.
     */
    public ?array $business_segment;
    
    /**
     * Number of employees of company.
     */
    public ?array $number_of_employees;
    
    /**
     * <READONLY> Company main contact ID from Sellsy.
     */
    public ?int $main_contact_id;
    
    /**
     * <READONLY> Company main dunning ID from Sellsy.
     */
    public ?int $dunning_contact_id;
    
    /**
     * <READONLY> Company invoicing contact ID from Sellsy.
     */
    public ?int $invoicing_contact_id;

    /**
     * <READONLY> Company main contact entity.
     */
    public ?Contact $main_contact;

    /**
     * <READONLY> Company dunning contact entity.
     */
    public ?Contact $dunning_contact;

    /**
     * <READONLY> Company invoicing contact entity.
     */
    public ?Contact $invoicing_contact;
    
    /**
     * <READONLY> Company creates date from Sellsy.
     */
    public ?string $created;
    
    /**
     * <READONLY> Company owner from Sellsy.
     */
    public ?array $owner;
}
