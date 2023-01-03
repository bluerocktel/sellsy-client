<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The Contact Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Socials extends Entity
{
    /**
     * The contact twitter account link.
     */
    public ?string $twitter;
    
    /**
     * The contact facebook account link.
     */
    public ?string $facebook;
    
    /**
     * The contact linkedin account link.
     */
    public ?string $linkedin;
    
    /**
     * The contact viadeo account link.
     */
    public ?string $viadeo;
}
