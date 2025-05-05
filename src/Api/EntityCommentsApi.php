<?php

namespace Bluerock\Sellsy\Api;

use Illuminate\Support\Str;
use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Collections\CommentCollection;
use Bluerock\Sellsy\Entities\Comment;
use Bluerock\Sellsy\Entities\Contracts\HasAddresses;


/**
 * The API client for the `addresses` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.4.1
 */
class EntityCommentsApi extends AbstractApi
{
	/**
	 * @var HasAddresses The related entity owning the comments.
	 */
	protected $relatedEntity;

	/**
	 * @var string The related entity base endpoint.
	 */
	protected $endpoint;

    /**
	 * @param HasAddresses $relatedEntity   related entity owning the address.
     * @inheritdoc
     */
    public function __construct(HasAddresses $relatedEntity)
    {
        parent::__construct();

        $endpoint = Str::of(get_class($relatedEntity))
            ->afterLast('\\')
            ->lower()
            ->plural();

        $this->entity     = Comment::class;
        $this->collection = CommentCollection::class;

        $this->endpoint = (string) $endpoint;
        $this->relatedEntity = $relatedEntity;
    }


    /**
     * List all comments of the related entity.
     * (Do a search call with the related entity id as filter)
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-comments
     */
    public function index(array $query = []): Response
    {
        return $this->search($query);
    }


    /**
     * Search comments associated to the related entity with some filters.
     *
     * @param array $query    Query parameters.
     * @param array $filters  Filters to use (will be merged with the filter for the related entity).
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/search-comments
     */
    public function search(array $query = [], array $filters = []): Response
    {
        $filters[$this->endpoint] = [ $this->relatedEntity->id ];

        $response = $this->connection
            ->request($this->appendQuery('comments/search', $query))
            ->post(compact('filters'));

        return $this->prepareResponse($response);
    }

}
