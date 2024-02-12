<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\CreditNote;


/**
 * The CreditNote Entity collection.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.2.3
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\CreditNote current
 */
class CreditNoteCollection extends InvoiceCollection
{
    public static function create(array $data): CreditNoteCollection
    {
        return new static(CreditNote::arrayOf($data));
    }
}
