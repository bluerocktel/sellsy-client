<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\Payment;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Payment Entity collection.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.2.4
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\Payment current
 */
class PaymentCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): PaymentCollection
    {
        return new static(Payment::arrayOf($data));
    }
}
