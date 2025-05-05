<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Collections\CommentCollection;
use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Entities\Comment;

/**
 * The API client for the `comments` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik/com>
 * @version 1.2.3
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Comments
 */
class CommentsApi extends AbstractApi
{
	/**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->entity     = Comment::class;
        $this->collection = CommentCollection::class;
    }

    /**
     * List all comments.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-comments
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request('comments')
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Show a single comment by id.
     *
     * @param string $id     The comment id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-comment
     */
    public function show(string $id, array $query = []): Response
    {
        $response = $this->connection
                        ->request("comments/{$id}")
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Store (create) an comment.
     *
     * @param Comment $comment The comment entity to store.
     * @param array   $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/create-comment
     */
    public function store(Comment $comment, array $query = []): Response
    {
        $body = $comment->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request('comments')
                        ->post(array_filter($body) + $query);

        return $this->prepareResponse($response);
    }

    /**
     * Update an existing comment.
     *
     * @param Comment $comment The comment entity to store.
     * @param array   $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/update-comment
     */
    public function update(Comment $comment, array $query = []): Response
    {
        $body = $comment->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request("comments/{$comment->id}")
                        ->put(array_filter($body) + $query);

        return $this->prepareResponse($response);
    }

    /**
     * Delete an existing comment.
     *
     * @param int $id The comment id to be deleted.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/delete-comment
     */
    public function destroy(int $id): Response
    {
        $response = $this->connection
                        ->request("comments/{$id}")
                        ->delete();

        return $this->prepareResponse($response);
    }

    /**
     * Search comments with some filters.
     *
     * @param array $query    Query parameters.
     * @param array $filters  Filters to use.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/search-comments
     */
    public function search(array $query = [], array $filters = []): Response
    {
        $response = $this->connection
                        ->request($this->appendQuery('comments/search', $query))
                        ->post(compact('filters'));

        return $this->prepareResponse($response);
    }

}
