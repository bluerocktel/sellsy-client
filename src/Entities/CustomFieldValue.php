<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Api;
use Bluerock\Sellsy\Entities\Entity;

/**
 * The CustomFieldValue Entity.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class CustomFieldValue extends Entity
{
    /**
     * <READONLY> CustomField ID from Sellsy.
     */
    public ?int $id;

    /**
     * @var mixed	Custom field field value.
     */
    public $value;
}
