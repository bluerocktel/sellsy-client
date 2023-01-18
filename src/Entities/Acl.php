<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The Contact Entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Acl extends Entity
{
    /**
     * The current user can update the entity.
     */
    public bool $can_be_updated = true;
    
    /**
     * The current user can delete the entity.
     */
    public bool $can_be_deleted = true;
    
    /**
     * The current user can view the company entity addresses.
     */
    public ?bool $view_companies_addresses = false;
    
    /**
     * The current user can create addresses for the company entity.
     */
    public ?bool $create_companies_addresses = false;
    
    /**
     * The current user can update addresses for the company entity.
     */
    public ?bool $update_companies_addresses = false;
    
    /**
     * The current user can delete addresses for the company entity.
     */
    public ?bool $delete_companies_addresses = false;
}
