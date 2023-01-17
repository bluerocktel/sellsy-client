<?php

namespace Bluerock\Sellsy\Core;

use Bluerock\Sellsy\Entities\Pagination;
use Bluerock\Sellsy\Contracts\EntityContract;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Illuminate\Http\Client\Response as IlluminateResponse;
use Bluerock\Sellsy\Exceptions\MissingRelatedEntityException;

/**
 * A wrapper around the Illuminate\Http\Client package.
 * This class is used to contain the response from the API request.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 */
class Response
{
    /**
     * The HTTP Client underlying response.
     *
     * @var \Illuminate\Http\Client\Response
     */
    protected IlluminateResponse $resp = null;
    
    /**
     * The realted DTO entity.
     *
     * @var RelatedEntity
     */
    protected ?RelatedEntity $related = null;

    /**
     * Initiate the Response.
     *
     * @return self
     */
    public function __construct(IlluminateResponse $resp, ?RelatedEntity $related = null)
    {
        $this->resp    = $resp;
        $this->related = $related;
    }

    /**
     * Initiate the Response.
     *
     * @return self
     */
    public static function make(IlluminateResponse $resp, ?RelatedEntity $related = null)
    {
        return new static($resp, $related);
    }

    /**
     * Set the related DTO entity.
     * 
     * @param RelatedEntity $related
     * @return self
     */
    public function setRelatedEntity(RelatedEntity $related)
    {
        $this->related = $related;
        return $this;
    }
    
    /**
     * Get the related DTO entity.
     * 
     * @return ?RelatedEntity
     */
    public function getRelatedEntity(): ?RelatedEntity
    {
        return $this->related;
    }

    /**
     * Get the base response from the HTTP Client.
     * 
     * @return \Illuminate\Http\Client\Response
     */
    public function base(): IlluminateResponse
    {
        return $this->resp;
    }

    /**
     * Get the response json data.
     *
     * @return array
     */
    public function json(): ?array
    {
        $data = $this->resp->json();

        if (isset($data['data'])) {
            $data['data'] = array_map([$this, 'parseEmbed'], $data['data']);
        }

        return $this->parseEmbed($data);
    }
    
    /**
     * Parse embed fields.
     *
     * @return array
     */
    protected function parseEmbed(array $data): ?array
    {
        if (isset($data['_embed'])) {
            $data = array_merge($data, $data['_embed']);
            unset($data['_embed']);
        }

        return $data;
    }
    
    /**
     * Get the entity bundled in the response.
     *
     * @return EntityContract
     */
    public function entity(): ?EntityContract
    {
        if (!($this->related instanceof RelatedEntity)) {
            throw new MissingRelatedEntityException('No related entity defined for this response instance.');
        }

        return $this->related->newEntity($this->json());
    }
    
    /**
     * Get the last request parsed entity.
     *
     * @return EntityContract
     */
    public function entities(): ?EntityCollectionContract
    {
        if (!($this->related instanceof RelatedEntity)) {
            throw new MissingRelatedEntityException('No related entity defined for this response instance.');
        }

        $data = $this->json();

        return isset($data['data']) 
                    ? $this->related->newCollection($data['data'])
                    : null;
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

    /**
     * Get the last request parsed entity.
     *
     * @return EntityContract
     */
    public function type()
    {
        $data = $this->json();

        return isset($data['data']) && isset($data['pagination'])
                    ? 'collection'
                    : 'entity';
    }

    /**
     * Handle dynamic method calls to the response object.
     * Returns self for method chaining.
     *
     * @param  string  $method
     * @param  array   $args
     * @return self
     */
    public function __call($method, $args)
    {
        switch (count($args)) {
            case 0:
                return $this->resp->$method();
                break;

            case 1:
                return $this->resp->$method($args[0]);
                break;

            case 2:
                return $this->resp->$method($args[0], $args[1]);
                break;

            case 3:
                return $this->resp->$method($args[0], $args[1], $args[2]);
                break;

            case 4:
                return $this->resp->$method($args[0], $args[1], $args[2], $args[3]);
                break;

            default:
                return call_user_func_array([$this->resp, $method], $args);
        }
    }
}
