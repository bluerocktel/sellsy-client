<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\Individual;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Individual Entity collection.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\Individual current
 */
class IndividualCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): IndividualCollection
    {
        return new static(Individual::arrayOf($data));
    }
}
