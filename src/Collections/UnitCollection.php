<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\Unit;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Unit Entity collection.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\Unit current
 */
class UnitCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): UnitCollection
    {
        return new static(Unit::arrayOf($data));
    }
}
