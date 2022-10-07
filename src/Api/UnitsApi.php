<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\Unit;
use Bluerock\Sellsy\Collections\UnitCollection;

/**
 * The API client for the `units` namespace.
 *
 * @package sellsy-connector
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
     * @return \Illuminate\Http\Client\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-units
     */
    public function index(array $query = []): self
    {
        $response = $this->connection
                        ->request('units')
                        ->get($query);

        $this->response = $response;
        $this->response->throw();

        return $this;
    }
}
