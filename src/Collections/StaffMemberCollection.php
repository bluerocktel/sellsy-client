<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\StaffMember;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The StaffMember Entity collection.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.1
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\StaffMember current
 */
class StaffMemberCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): StaffMemberCollection
    {
        return new static(StaffMember::arrayOf($data));
    }
}
