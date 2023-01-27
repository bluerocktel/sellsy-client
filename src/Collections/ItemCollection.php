<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\Item;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Item Entity collection.
 *
 * @package cedricWebsenso/sellsy-client
 * @author Cédric <cedric@websenso.com>
 * @version 1.0
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\Item current
 */
class ItemCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): ItemCollection
    {
        return new static(Item::arrayOf($data));
    }
}
