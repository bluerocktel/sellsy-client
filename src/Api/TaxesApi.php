<?php

namespace Hydrat\Sellsy\Api;

use Hydrat\Sellsy\Entities\Tax;
use Hydrat\Sellsy\Collections\TaxCollection;

/**
 * The API client for the `companies` namespace.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 */
class TaxesApi extends AbstractApi
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->entity     = Tax::class;
        $this->collection = TaxCollection::class;
    }


    /**
     * List all taxes.
     *
     * @param array $query Query parameters.
     *
     * @return \Illuminate\Http\Client\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-taxes
     */
    public function index(array $query = []): self
    {
        $response = $this->connection
                        ->request('taxes')
                        ->get($query);

        $this->response = $response;
        $this->response->throw();

        return $this;
    }
}
