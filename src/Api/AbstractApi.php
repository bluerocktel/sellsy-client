<?php

namespace Hydrat\Sellsy\Api;

use Hydrat\Sellsy\Core\Connection;
use Illuminate\Http\Client\Response;
use Hydrat\Sellsy\Entities\Pagination;
use Hydrat\Sellsy\Contracts\EntityContract;
use Hydrat\Sellsy\Contracts\EntityCollectionContract;

/**
 * The default API client class to extend.
 * Use $connection->request($endpoint) to create a new authenticated request.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 */
abstract class AbstractApi
{
    /**
     * The Connection instance used to generate API requests.
     *
     * @var \Hydrat\Sellsy\Core\Connection
     */
    protected ?Connection $connection;

    /**
     * The last request response.
     *
     * @var \Illuminate\Http\Client\Response
     */
    protected ?Response $response;

    /**
     * The related entity.
     *
     * @var string \Hydrat\Sellsy\Contracts\EntityContract
     */
    protected string $entity;

    /**
     * The related entity collection.
     *
     * @var string \Hydrat\Sellsy\Contracts\EntityCollectionContract
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
     * Get the last request response.
     *
     * @return \Illuminate\Http\Client\Response
     */
    public function response(): Response
    {
        return $this->response;
    }
    
    /**
     * Get the last request json data.
     *
     * @return array
     */
    public function json(): ?array
    {
        $data = $this->response->json();

        if (isset($data['_embed'])) {
            $data = array_merge($data, array_merge($data, $data['_embed']));
            unset($data['_embed']);
        }

        return $data;
    }
    
    /**
     * Get the last request parsed entity.
     *
     * @return EntityContract
     */
    public function entity(): ?EntityContract
    {
        return new $this->entity($this->json());
    }
    
    /**
     * Get the last request parsed entity.
     *
     * @return EntityContract
     */
    public function entities(): ?EntityCollectionContract
    {
        $data = $this->json();

        return isset($data['data']) ? new $this->collection($data['data']) : null;
    }
    
    /**
     * Get the last request parsed entity.
     *
     * @return EntityContract
     */
    public function pagination(): ?Pagination
    {
        $data = $this->json();

        return isset($data['pagination']) ? new Pagination($data['pagination']) : null;
    }
}
