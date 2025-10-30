<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The PaymentAmount Entity. (Sent in the request body)
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class PaymentAmount extends Entity
{
    /**
     * Amount value.
     *
     * @var int|float|string
     */
    public $value;

    /**
     * Amount currency.
     *
     * @var string
     */
    public string $currency;
}
