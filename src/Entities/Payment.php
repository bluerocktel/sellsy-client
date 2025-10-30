<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;
use Bluerock\Sellsy\Entities\PaymentAmount;
use Bluerock\Sellsy\Entities\PaymentAmounts;

/**
 * The Payment Entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Payment extends Entity
{
    /**
     * <READONLY> Payment ID from Sellsy.
     */
    public ?int $id;

    /**
     * Payment number.
     */
    public ?string $number;

    /**
     * Payment paid at.
     */
    public ?string $paid_at;

    /**
     * Payment status.
     */
    public ?string $status;

    /**
     * Payment payment method id.
     */
    public ?int $payment_method_id;

    /**
     * Payment type.
     */
    public ?string $type;

    /**
     * Payment amount. (Sent in the request body)
     */
    public ?PaymentAmount $amount;

    /**
     * Payment amounts. (Received in the response body)
     */
    public ?PaymentAmounts $amounts;

    /**
     * Payment bank deposit.
     */
    public ?array $bank_deposit;

    /**
     * Payment related.
     */
    public ?array $related;

    /**
     * Payment related objects.
     */
    public ?array $related_objects;

    /**
     * Payment note.
     */
    public ?string $note;
}
