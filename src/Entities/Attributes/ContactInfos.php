<?php

namespace Hydrat\Sellsy\Entities\Attributes;

/**
 * ContactInfos Attributes.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 */
trait ContactInfos
{
    /**
     * Entity email.
     */
    public ?string $email;

    /**
     * Entity website.
     */
    public ?string $website;

    /**
     * Entity phone number.
     */
    public ?string $phone_number;
    
    /**
     * Entity mobile number.
     */
    public ?string $mobile_number;
    
    /**
     * Entity fax number.
     */
    public ?string $fax_number;
}
