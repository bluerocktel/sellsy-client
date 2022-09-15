<?php

namespace Bluerock\Sellsy\Core;

use Bluerock\Sellsy\Exceptions\DomainException;

/**
 * A client instance retreiving corresponding API class fluently.
 * E.g: Show single contact address : Client::contacts()->addresses()->show($id).
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Client
{
    public function __call(string $name, array $arguments)
    {
        return static::__callStatic($name, $arguments);
    }

    /**
     * To return the collection instance, initiated by the definition.
     *
     * @param class-string<CollectionInterface> $collectionName
     * @param array<mixed, mixed> $arguments
     *
     * @throws DomainException  if the collection does not exist
     * @throws RuntimeException if the collection's definition does not implementing the good interface
     * @throws ReflectionException
     */
    public static function __callStatic(string $name, array $arguments)
    {
        $class = 'Bluerock\Sellsy\Api\\' . ucfirst($name) . 'Api';

        if (!class_exists($class)) {
            throw new DomainException("Error, the api '{$name}' has been not found (looking for class `{$class}`.");
        }

        // $reflectionClass = new ReflectionClass($collectionClassName);
        // if (!$reflectionClass->implementsInterface(DefinitionInterface::class)) {
        //     throw new RuntimeException(
        //         "Error, the definition of $collectionName must implement " . DefinitionInterface::class
        //     );
        // }
        // /** @var callable $definitionInstance */
        // $definitionInstance = $reflectionClass->newInstance();

        return new $class();
    }
}
