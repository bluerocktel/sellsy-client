<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Contracts\EntityContract;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

/**
 * The Contact Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class ContactSync extends FlexibleDataTransferObject implements EntityContract
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
