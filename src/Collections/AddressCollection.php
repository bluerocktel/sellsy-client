<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\Address;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Address Entity collection.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.2.4
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\Address current
 */
class AddressCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): AddressCollection
    {
        return new static(Address::arrayOf($data));
    }
}
