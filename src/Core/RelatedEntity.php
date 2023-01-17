<?php

namespace Bluerock\Sellsy\Core;

use Bluerock\Sellsy\Contracts\EntityContract;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;

/**
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 */
class RelatedEntity
{
    /**
     * The related entity.
     *
     * @var string \Bluerock\Sellsy\Contracts\EntityContract
     */
    protected string $single;

    /**
     * The related entity collection.
     *
     * @var string \Bluerock\Sellsy\Contracts\EntityCollectionContract
     */
    protected string $collection;

    /**
     * Initiate the RelatedEntity class.
     */
    public function __construct(
        string $single,
        string $collection
    ) {
        $this->single     = $single;
        $this->collection = $collection;
    }

    /**
     * Get the related single entity class.
     */
    public function single(): string
    {
        return $this->single;
    }
    
    /**
     * Get the related entity collection class.
     */
    public function collection(): string
    {
        return $this->collection;
    }

    /**
     * Instanciate a new entity from response body.
     */
    public function newEntity(array $data): EntityContract
    {
        return new $this->single($data);
    }
    
    /**
     * Instanciate a new collection of entities from response body.
     */
    public function newCollection(array $data): EntityCollectionContract
    {
        return $this->collection()::create($data);
    }
}
