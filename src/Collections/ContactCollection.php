<?php

namespace Hydrat\Sellsy\Collections;

use Hydrat\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Contact Entity collection.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 *
 * @method \Hydrat\Sellsy\Entities\Contact current
 */
class ContactCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
}
