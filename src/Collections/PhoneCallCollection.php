<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\PhoneCall;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The PhoneCall Entity collection.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.1
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\PhoneCall current
 */
class PhoneCallCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): PhoneCallCollection
    {
        return new static(PhoneCall::arrayOf($data));
    }
}
