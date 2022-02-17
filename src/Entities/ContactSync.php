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
