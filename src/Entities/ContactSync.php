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
class ContactSync extends Entity
{
    /**
     * Weither the contact should be synchronised with mailchimp.
     */
    public bool $mailchimp = true;
    
    /**
     * Weither the contact should be synchronised with mailjet.
     */
    public bool $mailjet = true;
    
    /**
     * Weither the contact should be synchronised with simplemail.
     */
    public bool $simplemail = true;
}
