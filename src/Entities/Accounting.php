<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The Accounting Entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 */
class Accounting extends Entity
{
    /**
     * Accounting code ID.
     */
    public ?int $accounting_code_id;

    /**
     * Discount accounting code ID.
     */
    public ?int $discount_accounting_code_id;
}
