<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\Invoice;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Invoice Entity collection.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.3
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\Invoice current
 */
class InvoiceCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): InvoiceCollection
    {
        return new static(Invoice::arrayOf($data));
    }
}
