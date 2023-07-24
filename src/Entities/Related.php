<?php

namespace Bluerock\Sellsy\Entities;

/**
 * A related entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.1
 * @access public
 */
class Related extends Entity
{
    /**
     * <READONLY> Related entity ID from Sellsy.
     */
    public ?int $id;

    /**
     * Related entity type.
     */
    public string $type;
}
