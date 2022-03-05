<?php

namespace Bluerock\Sellsy\Entities\Attributes;

/**
 * ACL Attributes.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 */
trait Acl
{
    /**
     * <READONLY> Company ACL.
     */
    public ?Acl $acl;
}
