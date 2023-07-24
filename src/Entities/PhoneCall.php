<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Attributes;
use Bluerock\Sellsy\Entities\Entity;

/**
 * The Phone Call Entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.1
 * @access public
 */
class PhoneCall extends Entity
{
    use Attributes\Acl;

    public ?int $id;

    public ?int $owner_id;

    public ?int $company_id;

    public ?int $individual_id;

    public ?int $contact_id;

    public string $source; // Enum: "incoming" "outcoming"

    public ?string $description;

    public ?string $date;

    public ?int $duration;

    public ?PhoneCallTopic $topic;

    public ?PhoneCallResult $result;

    /**
     * Related entities, where type in: "company" "individual" "contact" "opportunity"
     *
     * @var \Bluerock\Sellsy\Entities\Related[]|null
     */
    public $related;

    public ?string $created;

    public ?string $updated;

    public ?StaffMember $owner;
}
