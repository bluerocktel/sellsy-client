<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\RateCategory;
use Bluerock\Sellsy\Collections\RateCategoryCollection;
use Bluerock\Sellsy\Core\Response;

/**
 * The API client for the `rate-categories` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Rate-Categories
 */
class RateCategoriesApi extends AbstractApi
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->entity     = RateCategory::class;
        $this->collection = RateCategoryCollection::class;
    }

    /**
     * List all rate categories.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-rate-categories
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request('rate-categories')
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Show a single rate category by id.
     *
     * @param string $id     The rate category id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-rate-category
     */
    public function show(string $id, array $query = []): Response
    {
        $response = $this->connection
                        ->request("rate-categories/{$id}")
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Store (create) a rate category.
     *
     * @param RateCategory $rateCategory The rate category entity to store.
     * @param array   $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/create-rate-category
     */
    public function store(RateCategory $rateCategory, array $query = []): Response
    {
        $body = $rateCategory->except('id')
                        ->toArray();

        $response = $this->connection
                        ->request('rate-categories')
                        ->post(array_filter($body) + $query);
        
        return $this->prepareResponse($response);
    }

    /**
     * Update an existing rate category.
     *
     * @param RateCategory $rateCategory The rate category entity to store.
     * @param array   $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/update-rate-category
     */
    public function update(RateCategory $rateCategory, array $query = []): Response
    {
        $body = $rateCategory->except('id')
                        ->toArray();

        $response = $this->connection
                        ->request("rate-categories/{$rateCategory->id}")
                        ->put(array_filter($body) + $query);
        
        return $this->prepareResponse($response);
    }

    /**
     * Delete an existing rate category.
     *
     * @param int $id The rate category id to be deleted.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/delete-rate-category
     */
    public function destroy(int $id): Response
    {
        $response = $this->connection
                        ->request("rate-categories/{$id}")
                        ->delete();
        
        return $this->prepareResponse($response);
    }
}
