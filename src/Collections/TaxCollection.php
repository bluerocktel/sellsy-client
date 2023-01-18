<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\Tax;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Tax Entity collection.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\Tax current
 */
class TaxCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): TaxCollection
    {
        return new static(Tax::arrayOf($data));
    }
}
