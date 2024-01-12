<?php

namespace Bluerock\Sellsy\Core;

use Bluerock\Sellsy\Exceptions\ApiClientErrorException;
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
     * The singleton instances (one instance by Sellsy account)
     *
     * @var Config[]
     */
    protected static $_instance = [];

	/**
	 * The current Sellsy account instance name
	 * @var string
	 */
	protected static $_instance_name = '';


    /**
     * Get the instance for the current Sellsy account. To change of context (if you have multiple Sellsy accounts
	 * at the same time), use switchInstance() to switch to another one.
	 * @param string $sellsy_account	An identifier for your Sellsy account. Empty if you have only one account
     *
     * @return Config
     */
    public static function getInstance()
    {
        if (!isset(static::$_instance[static::$_instance_name])) {
            static::$_instance[static::$_instance_name] = new static;
        }
        return static::$_instance[static::$_instance_name];
    }


	/**
	 * Only use if you have multiple Sellsy accounts opened at the same time. Switch to a new instance, identified
	 * by an arbitrary name you give. Every web request made after this operation will be on the new active instance
	 * @param string $sellsy_account	An identifier for your Sellsy account. Empty string to switch back to
	 *                               	the main account (the first one)
	 *
	 * @return Config
	 */
	public static function switchInstance(string $sellsy_account = '')
	{
		static::$_instance_name = $sellsy_account;
		return static::getInstance();
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
