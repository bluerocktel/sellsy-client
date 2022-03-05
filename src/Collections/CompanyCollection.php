<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\Company;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Contact Entity collection.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\Company current
 */
class CompanyCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): CompanyCollection
    {
        return new static(Company::arrayOf($data));
    }
}
