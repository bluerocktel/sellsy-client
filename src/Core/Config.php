<?php

namespace Bluerock\Sellsy\Core;

use Illuminate\Support\Arr;

/**
 * The configuration helper.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Config
{
    /**
     * The singleton instance.
     *
     * @var Config
     */
    protected static $_instance = null;

    /**
     * Get the instance.
     *
     * @return Config
     */
    public static function getInstance()
    {
        if (!static::$_instance) {
            static::$_instance = new static;
        }

        return static::$_instance;
    }

    /**
     * Private constructor for the singleton.
     */
    private function __construct()
    {
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
     * The configuration array.
     *
     * @var array
     */
    protected array $config = [
        'url'            => 'https://api.sellsy.com/v2/',
        'client_id'      => '',
        'client_secret'  => '',
        'authentication' => [
            'token'      => '',
            'expires_at' => null,
        ],
    ];

    /**
     * Get a configuration from it's key.
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return Arr::get($this->config, $key, $default);
    }

    /**
     * Set a configuration key/value pair.
     *
     * @return self
     */
    public function set($key, $value = null)
    {
        Arr::set($this->config, $key, $value);

        return $this;
    }
}
