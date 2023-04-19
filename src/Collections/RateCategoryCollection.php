<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\RateCategory;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The RateCategory Entity collection.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\RateCategory current
 */
class RateCategoryCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): RateCategoryCollection
    {
        return new static(RateCategory::arrayOf($data));
    }
}
