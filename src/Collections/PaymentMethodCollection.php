<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\PaymentMethod;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The PaymentMethod Entity collection.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.2.4
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\PaymentMethod current
 */
class PaymentMethodCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): PaymentMethodCollection
    {
        return new static(PaymentMethod::arrayOf($data));
    }
}
