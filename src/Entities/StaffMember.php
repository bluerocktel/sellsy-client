<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The StaffMember Entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.1
 * @access public
 */
class StaffMember extends Entity
{
    use Attributes\Acl;

    public ?int $id;

    public ?string $lastname;

    public ?string $firstname;

    public ?string $email;

    public ?string $avatar;
    
    public ?string $status;

    public ?string $phone_number;

    public ?string $mobile_number;

    public ?string $fax_number;

    public ?string $civility; // Enum: "mr" "mrs" "ms"

    public ?string $position;

    public ?int $profile;

    /**
     * @var int|array|null $team
     */
    public $team; // staff team, -1 for any team

    public ?int $job; // staff job, -1 for any job

    public ?string $timezone; // eg: "Europe/Paris"

    public ?string $language; // eg: "fr"

    public ?bool $first_connection_onboarding;

    public ?array $licenses;

    public ?string $created;

    public ?string $updated;
}
