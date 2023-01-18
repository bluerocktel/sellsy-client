<?php

namespace Bluerock\Sellsy\Core;

use Bluerock\Sellsy\Exceptions\DomainException;

/**
 * A Client facade fluently retreiving API classes from their namespace.
 * E.g: Show single contact : Client::contacts()->show($id).
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 */
class Client
{
    public function __call(string $name, array $arguments)
    {
        return static::__callStatic($name, $arguments);
    }

    /**
     * Return the API class instance, found by the namespace.
     *
     * @param string $name
     * @throws \Bluerock\Sellsy\Exceptions\DomainException  if the namespace does not exist
     */
    public static function __callStatic(string $name, array $arguments)
    {
        $class = '\Bluerock\Sellsy\Api\\' . ucfirst($name) . 'Api';

        if (!class_exists($class)) {
            throw new DomainException("The api namespace '{$name}' has not been found (Class `{$class}` does not exist).");
        }

        return new $class(...$arguments);
    }
}
