<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Entities\Item;
use Bluerock\Sellsy\Collections\ItemCollection;

/**
 * The API client for the `items` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Cédric <cedric@websenso.com>
 * @version 1.2.3
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Items
 */
class ItemsApi extends AbstractApi
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->entity     = Item::class;
        $this->collection = ItemCollection::class;
    }

    /**
     * List all items.
     *
     * @param array $query Query parameters.
     *
     * @return \Illuminate\Http\Client\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-item
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request('items')
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Show a single item by id.
     *
     * @param string $id     The item id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-item
     */
    public function show(string $id, array $query = []): Response
    {
        $response = $this->connection
                        ->request("items/{$id}")
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Store (create) an item.
     *
     * @param Item  $item The item entity to store.
     * @param array $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/create-item
     */
    public function store(Item $item, array $query = []): Response
    {
        $body = $item->except('id')
                    ->except('owner')
                    ->toArray();

        $response = $this->connection
                        ->request('items')
                        ->post(array_filter($body) + $query);

        return $this->prepareResponse($response);
    }

    /**
     * Update an existing item.
     *
     * @param Item  $item The item entity to store.
     * @param array $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/update-item
     */
    public function update(Item $item, array $query = []): Response
    {
        $body = $item->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request("items/{$item->id}")
                        ->put(
                            array_filter($body) + $query
                        );

        return $this->prepareResponse($response);
    }

    /**
     * Delete an existing item.
     *
     * @param int $id The item id to be deleted.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/delete-item
     */
    public function destroy(int $id): Response
    {
        $response = $this->connection
                        ->request("items/{$id}")
                        ->delete();

        return $this->prepareResponse($response);
    }
}
