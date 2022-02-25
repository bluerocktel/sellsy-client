<?php

namespace Hydrat\Sellsy\Collections;

use Hydrat\Sellsy\Entities\Tax;
use Hydrat\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Tax Entity collection.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 *
 * @method \Hydrat\Sellsy\Entities\Tax current
 */
class TaxCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): TaxCollection
    {
        return new static(Tax::arrayOf($data));
    }
}
