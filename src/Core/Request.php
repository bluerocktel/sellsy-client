<?php

namespace Bluerock\Sellsy\Core;

use Illuminate\Http\Client\Factory;

/**
 * A wrapper around the Illuminate\Http\Client package.
 * Allows the creation of a pending request, giving the endpoint
 * at class creation so we can alter the PendingRequest before submission.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Request
{
    /**
     * The HTTP Client holder.
     *
     * @var Factory|PendingRequest
     */
    protected $req = null;

    /**
     * Initiate the Request.
     *
     * @param string $url The request endpoint to request.
     * @return self
     */
    public function __construct(string $url)
    {
        $this->url = $url;
        $this->req = new Factory();
    }

    /**
     * Initiate the Request.
     *
     * @param string $url The request endpoint to request.
     * @return self
     */
    public static function make(string $url)
    {
        return new static($url);
    }

    /**
     * Issue a GET request to the given URL.
     *
     * @param  array|string|null  $query
     * @return \Illuminate\Http\Client\Response
     */
    public function get($query = null)
    {
        return $this->req->get($this->url, $query);
    }

    /**
     * Issue a HEAD request to the given URL.
     *
     * @param  array|string|null  $query
     * @return \Illuminate\Http\Client\Response
     */
    public function head($query = null)
    {
        return $this->req->head($this->url, $query);
    }

    /**
     * Issue a POST request to the given URL.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Client\Response
     */
    public function post(array $data = [])
    {
        return $this->req->post($this->url, $data);
    }

    /**
     * Issue a PATCH request to the given URL.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Client\Response
     */
    public function patch($data = [])
    {
        return $this->req->patch($this->url, $data);
    }

    /**
     * Issue a PUT request to the given URL.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Client\Response
     */
    public function put($data = [])
    {
        return $this->req->put($this->url, $data);
    }

    /**
     * Issue a DELETE request to the given URL.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Client\Response
     */
    public function delete($data = [])
    {
        return $this->req->delete($this->url, $data);
    }

    /**
     * Handle dynamic method calls to the request object.
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
                $this->req = $this->req->$method();
                break;

            case 1:
                $this->req = $this->req->$method($args[0]);
                break;

            case 2:
                $this->req = $this->req->$method($args[0], $args[1]);
                break;

            case 3:
                $this->req = $this->req->$method($args[0], $args[1], $args[2]);
                break;

            case 4:
                $this->req = $this->req->$method($args[0], $args[1], $args[2], $args[3]);
                break;

            default:
                $this->req = call_user_func_array([$this->req, $method], $args);
        }

        return $this;
    }
}
