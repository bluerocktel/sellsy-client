<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\Contact;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Contact Entity collection.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\Contact current
 */
class ContactCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): ContactCollection
    {
        return new static(Contact::arrayOf($data));
    }
}
