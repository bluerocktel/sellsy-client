<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The PaymentMethod Entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class PaymentMethod extends Entity
{
    /**
     * <READONLY> PaymentMethod ID from Sellsy.
     */
    public ?int $id;

    /**
     * PaymentMethod label.
     */
    public ?string $label;
}
