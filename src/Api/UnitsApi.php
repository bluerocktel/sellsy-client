<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\Unit;
use Bluerock\Sellsy\Collections\UnitCollection;
use Bluerock\Sellsy\Core\Response;

/**
 * The API client for the `units` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Units
 */
class UnitsApi extends AbstractApi
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->entity     = Unit::class;
        $this->collection = UnitCollection::class;
    }

    /**
     * List all units.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-units
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request('units')
                        ->get($query);

        return $this->prepareResponse($response);
    }
}
