<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\Individual;
use Bluerock\Sellsy\Collections\IndividualCollection;

/**
 * The API client for the `individual` namespace.
 *
 * @package sellsy-connector
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
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/get-individuals
     */
    public function index(array $query = []): self
    {
        $response = $this->connection
                        ->request('individuals')
                        ->get($query);

        $this->response = $response;
        $this->response->throw();

        return $this;
    }

    /**
     * Show a single individual by id.
     *
     * @param string $id     The individual id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/get-individual
     */
    public function show(string $id, array $query = []): self
    {
        $response = $this->connection
                        ->request("individuals/{$id}")
                        ->get($query);

        $this->response = $response;
        $this->response->throw();

        return $this;
    }

    /**
     * Store (create) an individual.
     *
     * @param Individual $individual The individual entity to store.
     * @param array   $query   Query parameters.
     *
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/create-individual
     */
    public function store(Individual $individual, array $query = []): self
    {
        $body = $individual->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request('individuals')
                        ->post(array_filter($body) + $query);
        
        $this->response = $response;
        $this->response->throw();

        return $this;
    }

    /**
     * Update an existing individual.
     *
     * @param Individual $individual The individual entity to store.
     * @param array   $query   Query parameters.
     *
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/update-individual
     */
    public function update(Individual $individual, array $query = []): self
    {
        $body = $individual->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request("individuals/{$individual->id}")
                        ->put(array_filter($body) + $query);
        
        $this->response = $response;
        $this->response->throw();

        return $this;
    }

    /**
     * Delete an existing individual.
     *
     * @param int $id The individual id to be deleted.
     *
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/delete-individual
     */
    public function destroy(int $id): self
    {
        $response = $this->connection
                        ->request("individuals/{$id}")
                        ->delete();
        
        $this->response = $response;
        $this->response->throw();

        return $this;
    }

    /**
     * Search for companie using filters.
     *
     * @param array $query Query parameters.
     *
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/search-individuals
     */
    public function search(array $filters = [], array $query = []): self
    {
        $response = $this->connection
                        ->request('individuals/search')
                        ->post(compact('filters') + $query);

        $this->response = $response;
        $this->response->throw();

        return $this;
    }
}
