<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Contracts\EntityContract;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

/**
 * The Contact Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 */
class Socials extends FlexibleDataTransferObject implements EntityContract
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
