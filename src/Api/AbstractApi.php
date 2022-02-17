<?php

namespace Hydrat\Sellsy\Api;

use Hydrat\Sellsy\Core\Connection;

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
     * @var Connection
     */
    protected $connection;

    /**
     * The Api class constructor, setting up common tools.
     */
    public function __construct()
    {
        $this->connection = Connection::getInstance();
    }
}
