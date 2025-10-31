<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Entities\PaymentMethod;
use Bluerock\Sellsy\Collections\PaymentMethodCollection;

/**
 * The API client for the `payments/methods` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.3
 * @access public
 * @see https://docs.sellsy.com/api/v2/#tag/Payments
 */
class PaymentMethodsApi extends AbstractApi
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->entity     = PaymentMethod::class;
        $this->collection = PaymentMethodCollection::class;
    }

    /**
     * List all payment methods.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://docs.sellsy.com/api/v2/#operation/get-payment-methods
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request('payments/methods')
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Show a single payment method by id.
     *
     * @param string $id     The payment method id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://docs.sellsy.com/api/v2/#operation/get-payment-method
     */
    public function show(string $id, array $query = []): Response
    {
        $response = $this->connection
                        ->request("payments/methods/{$id}")
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Search payment methods with some filters.
     *
     * @param array $query    Query parameters.
     * @param array $filters  Filters to use.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://docs.sellsy.com/api/v2/#operation/search-payment-methods
     */
    public function search(array $query = [], array $filters = []): Response
    {
        $response = $this->connection
            ->request($this->appendQuery('payments/methods/search', $query))
            ->post(compact('filters'));

        return $this->prepareResponse($response);
    }
}
