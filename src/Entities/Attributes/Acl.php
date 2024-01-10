<?php

namespace Bluerock\Sellsy\Entities\Attributes;

use Bluerock\Sellsy\Entities;

/**
 * ACL Attributes.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
trait Acl
{
    /**
     * <READONLY> Entity ACL.
     */
    public ?Entities\Acl $acl;
}
