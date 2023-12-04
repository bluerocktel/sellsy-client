<?php

namespace Bluerock\Sellsy\Api;

use Illuminate\Support\Arr;
use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Core\Connection;
use Bluerock\Sellsy\Core\RelatedEntity;

/**
 * The default API client class to extend.
 * Use $connection->request($endpoint) to create a new authenticated request.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.3
 * @access public
 */
abstract class AbstractApi
{
    /**
     * The Connection instance used to generate API requests.
     *
     * @var \Bluerock\Sellsy\Core\Connection
     */
    protected ?Connection $connection;

    /**
     * The related entity.
     *
     * @var string \Bluerock\Sellsy\Contracts\EntityContract
     */
    protected string $entity;

    /**
     * The related entity collection.
     *
     * @var string \Bluerock\Sellsy\Contracts\EntityCollectionContract
     */
    protected string $collection;

    /**
     * The Api class constructor, setting up common tools.
     */
    public function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    /**
     * Parse the response.
     *
     * @return \Bluerock\Sellsy\Core\Response
     */
    protected function prepareResponse(Response $response): Response
    {
        $response->setRelatedEntity(
            new RelatedEntity($this->entity, $this->collection)
        );

        $response->throw();

        return $response;
    }

    /**
     * Append query to the given URL path.
     *
     * @return string
     */
    protected function appendQuery(string $path, array $query = []): string
    {
        return trim(
            $path .'?'. Arr::query($query),
            '?'
        );
    }
}
