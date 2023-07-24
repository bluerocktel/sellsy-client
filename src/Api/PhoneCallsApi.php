<?php

namespace Bluerock\Sellsy\Api;

use Illuminate\Support\Arr;
use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Entities\PhoneCall;
use Bluerock\Sellsy\Collections\PhoneCallCollection;

/**
 * The API client for the `phone-calls` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.1
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/PhoneCalls
 */
class PhoneCallsApi extends AbstractApi
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->entity     = PhoneCall::class;
        $this->collection = PhoneCallCollection::class;
    }

    /**
     * List all phone calls.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-phone-calls
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request('phone-calls')
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Show a single phone call by id.
     *
     * @param string $id     The phone call id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-phone-call
     */
    public function show(string $id, array $query = []): Response
    {
        $response = $this->connection
                        ->request("phone-calls/{$id}")
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Store (create) an phone call.
     *
     * @param PhoneCall $phoneCall The phone call entity to store.
     * @param array     $query     Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/create-phone-call
     */
    public function store(PhoneCall $phoneCall, array $query = []): Response
    {
        $body = $phoneCall->except('id')
                          ->except('owner')
                          ->except('result')
                          ->toArray();

        $result = $phoneCall->result ? $phoneCall->result->id : null;

        $response = $this->connection
                        ->request('phone-calls')
                        ->post(array_filter($body + compact('result')) + $query);
        
        return $this->prepareResponse($response);
    }

    /**
     * Update an existing phone call.
     *
     * @param PhoneCall $phoneCall The phone call entity to store.
     * @param array     $query     Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/update-phone-call
     */
    public function update(PhoneCall $phoneCall, array $query = []): Response
    {
        $body = $phoneCall->except('id')
                          ->except('owner')
                          ->except('result')
                          ->toArray();

        $result = $phoneCall->result ? $phoneCall->result->id : null;

        $response = $this->connection
                        ->request("phone-calls/{$phoneCall->id}")
                        ->put(array_filter($body + compact('result')) + $query);
        
        return $this->prepareResponse($response);
    }

    /**
     * Delete an existing phone call.
     *
     * @param int $id The phone call id to be deleted.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/delete-phone-call
     */
    public function destroy(int $id): Response
    {
        $response = $this->connection
                        ->request("phone-calls/{$id}")
                        ->delete();
        
        return $this->prepareResponse($response);
    }

    /**
     * Search phone calls with some filters.
     *
     * @param array $query    Query parameters.
     * @param array $filters  Filters to use.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/search-phone-calls
     */
    public function search(array $query = [], array $filters = []): Response
    {
        $response = $this->connection
                        ->request('phone-calls/search' . '?' . Arr::query($query))
                        ->post(
                            compact('filters')
                        );

        return $this->prepareResponse($response);
    }
}
