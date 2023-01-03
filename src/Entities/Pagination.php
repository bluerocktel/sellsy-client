<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The Contact Entity.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Pagination extends Entity
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
