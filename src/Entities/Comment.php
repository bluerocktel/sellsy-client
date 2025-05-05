<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The Comment Entity.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.4.1
 * @access public
 */
class Comment extends Entity
{
    /**
     * <READONLY> Comment ID from Sellsy.
     */
    public ?int $id;

    /**
     * Comment description.
     */
    public ?string $description;

    /**
     * <READONLY> Comment last update date from Sellsy.
     */
    public ?string $updated;

    /**
     * <READONLY> Comment create date from Sellsy.
     */
    public ?string $created;

    /**
     * <READONLY> Contact owner from Sellsy.
     */
    public ?array $owner;

    /**
     * Comment parent ID.
     */
    public ?int $parent_id;

    /**
     * Associated company ID from Sellsy.
     */
    public ?int $company_id;

    /**
     * Associated individual ID from Sellsy.
     */
    public ?int $individual_id;

    /**
     * Associated contact ID from Sellsy.
     */
    public ?int $contact_id;

    /**
     * Associated timetracking from Sellsy.
     */
    public ?Timetracking $timetracking;


}
