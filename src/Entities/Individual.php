<?php

namespace Bluerock\Sellsy\Entities;

/**
 * The Individual Entity.
 * This entity extends the generic "Client" entity, used also for Companies.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 */
class Individual extends Client
{   
    /**
     * Individual last name.
     */
    public string $last_name;

    /**
     * Individual first name.
     */
    public string $first_name;
    
    /**
     * Individual civility.
     */
    public string $civility;
}
