<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\Individual;
use Bluerock\Sellsy\Collections\IndividualCollection;
use Bluerock\Sellsy\Core\Response;

/**
 * The API client for the `individual` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Individuals
 */
class IndividualsApi extends AbstractApi
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->entity     = Individual::class;
        $this->collection = IndividualCollection::class;
    }

    /**
     * List all individuals.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-individuals
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request('individuals')
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Show a single individual by id.
     *
     * @param string $id     The individual id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-individual
     */
    public function show(string $id, array $query = []): Response
    {
        $response = $this->connection
                        ->request("individuals/{$id}")
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Store (create) an individual.
     *
     * @param Individual $individual The individual entity to store.
     * @param array   $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/create-individual
     */
    public function store(Individual $individual, array $query = []): Response
    {
        $body = $individual->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request('individuals')
                        ->post(array_filter($body) + $query);
        
        return $this->prepareResponse($response);
    }

    /**
     * Update an existing individual.
     *
     * @param Individual $individual The individual entity to store.
     * @param array   $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/update-individual
     */
    public function update(Individual $individual, array $query = []): Response
    {
        $body = $individual->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request("individuals/{$individual->id}")
                        ->put(array_filter($body) + $query);
        
        return $this->prepareResponse($response);
    }

    /**
     * Delete an existing individual.
     *
     * @param int $id The individual id to be deleted.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/delete-individual
     */
    public function destroy(int $id): Response
    {
        $response = $this->connection
                        ->request("individuals/{$id}")
                        ->delete();
        
        return $this->prepareResponse($response);
    }

    /**
     * Search for companie using filters.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/search-individuals
     */
    public function search(array $filters = [], array $query = []): Response
    {
        $response = $this->connection
                        ->request('individuals/search')
                        ->post(compact('filters') + $query);

        return $this->prepareResponse($response);
    }
}
