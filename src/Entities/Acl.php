<?php

namespace Hydrat\Sellsy\Entities;

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
class Acl extends FlexibleDataTransferObject implements EntityContract
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
