<?php

namespace Hydrat\Sellsy\Entities;

use Hydrat\Sellsy\Contracts\EntityContract;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

/**
 * The Contact Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 */
class Pagination extends FlexibleDataTransferObject implements EntityContract
{
    /**
     * The per_page pagination results.
     */
    public int $limit;

    /**
     * The total number of results available.
     */
    public int $total;

    /**
     * The number of results returned in this query.
     */
    public int $count;

    /**
     * The offset.
     *
     * @var int|string
     */
    public $offset;
}
