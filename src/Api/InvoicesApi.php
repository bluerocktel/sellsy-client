<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\Invoice;
use Bluerock\Sellsy\Collections\InvoiceCollection;
use Bluerock\Sellsy\Core\Response;

/**
 * The API client for the `rate-categories` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.3
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Invoices
 */
class InvoicesApi extends AbstractApi
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->entity     = Invoice::class;
        $this->collection = InvoiceCollection::class;
    }

    /**
     * List all invoices.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-invoice
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request('invoices')
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Show a single invoice by id.
     *
     * @param string $id     The invoice id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-invoice
     */
    public function show(string $id, array $query = []): Response
    {
        $response = $this->connection
                        ->request("invoices/{$id}")
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Search for invoices using filters.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/search-companies
     */
    public function search(array $filters = [], array $query = []): Response
    {
        $response = $this->connection
                        ->request($this->appendQuery('invoices/search', $query))
                        ->post(compact('filters'));

        return $this->prepareResponse($response);
    }
}
