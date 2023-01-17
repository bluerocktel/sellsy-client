<?php

namespace Bluerock\Sellsy\Core;

use Bluerock\Sellsy\Core\Config;
use Bluerock\Sellsy\Core\Request;

/**
 * The single connection instance, issuing prepared & authenticated requests.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Connection
{
    /**
     * The singleton instance.
     *
     * @var Connection
     */
    protected static $_instance = null;

    /**
     * The config instance.
     *
     * @var Config
     */
    protected $config = null;

    /**
     * Get the instance.
     *
     * @return Connection
     */
    public static function getInstance()
    {
        if (!static::$_instance) {
            static::$_instance = new static;
        }

        return static::$_instance;
    }

    /**
     * The connection constructor.
     */
    private function __construct()
    {
        $this->config = Config::getInstance();
    }
    
    /**
     * Singletons should not be cloneable.
     */
    protected function __clone()
    {
    }
    
    /**
     * Singletons should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /**
     * Build up Request with prepared Auth and Endpoint.
     */
    public function request(string $endpoint, ?RelatedEntity $related = null)
    {
        $endpoint = sprintf('%s/%s', trim($this->config->get('url'), '/'), $endpoint);

        return Request::make($endpoint, $related)
                ->withToken($this->getToken())
                ->withOptions([])
                ->withHeaders([
                    'Accept' => 'application/json',
                ]);
    }


    /**
     * Check if we have a valid token to use.
     *
     * @return bool
     */
    protected function hasValidToken()
    {
        return $this->config->get('authentication.token') && time() < $this->config->get('authentication.expires_at');
    }
    
    
    /**
     * Check if we have a valid token to use.
     *
     * @return bool
     */
    protected function getToken()
    {
        if ($this->hasValidToken()) {
            return $this->config->get('authentication.token');
        }

        $auth = new Authentication();

        $token = $auth->getToken(
            $this->config->get('client_id'),
            $this->config->get('client_secret'),
        );

        $this->config->set('authentication.token', $token['access_token']);
        $this->config->set('authentication.expires_at', time() + $token['expires_in']);

        return $token['access_token'];
    }
}
