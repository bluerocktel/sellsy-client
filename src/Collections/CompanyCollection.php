<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\Company;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Company Entity collection.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
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
