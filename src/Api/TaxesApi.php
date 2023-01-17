<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\Tax;
use Bluerock\Sellsy\Collections\TaxCollection;
use Bluerock\Sellsy\Core\Response;

/**
 * The API client for the `taxes` namespace.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Taxes
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
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-taxes
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request('taxes')
                        ->get($query);

        return $this->prepareResponse($response);
    }
}
