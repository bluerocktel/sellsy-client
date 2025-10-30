<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The PaymentAmounts Entity. (Received in the response body)
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class PaymentAmounts extends Entity
{
    /**
     * Total amount.
     *
     * @var string
     */
    public string $total;

    /**
     * Remaining amount.
     *
     * @var string
     */
    public string $remaining;
}
