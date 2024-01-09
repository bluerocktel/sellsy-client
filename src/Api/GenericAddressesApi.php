<?php

namespace Bluerock\Sellsy\Api;

use Illuminate\Support\Str;
use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Entities\Client;
use Bluerock\Sellsy\Entities\Address;
use Bluerock\Sellsy\Entities\Contact;
use Bluerock\Sellsy\Collections\AddressCollection;

/**
 * The API client for the `addresses` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.4
 */
class GenericAddressesApi extends AbstractApi
{
	/**
	 * @var Client|Contact The related entity owning the address.
	 */
	protected $relatedEntity;

	/**
	 * @var string The related entity base endpoint.
	 */
	protected $endpoint;

    /**
	 * @param Client|Contact $relatedEntity	The related entity owning the address.
     * @inheritdoc
     */
    public function __construct(Client|Contact $relatedEntity)
    {
        parent::__construct();

        $endpoint = Str::of(get_class($relatedEntity))
            ->afterLast('\\')
            ->lower()
            ->plural();

        $this->entity     = Address::class;
        $this->collection = AddressCollection::class;

        $this->endpoint = (string) $endpoint;
        $this->relatedEntity = $relatedEntity;
    }

    /**
     * List all addresses.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-company-addresses
	 * @see https://api.sellsy.com/doc/v2/#operation/get-contact-addresses
	 * @see https://api.sellsy.com/doc/v2/#operation/get-individual-addresses
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request("{$this->endpoint}/{$this->relatedEntity->id}/addresses")
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Show a single address by id.
     *
     * @param string $id     The address id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-company-address
	 * @see https://api.sellsy.com/doc/v2/#operation/get-contact-address
	 * @see https://api.sellsy.com/doc/v2/#operation/get-individual-address
	 *
     */
    public function show(string $id, array $query = []): Response
    {
        $response = $this->connection
                        ->request("{$this->endpoint}/{$this->relatedEntity->id}/addresses/{$id}")
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Store (create) an address.
     *
     * @param Address $address The address entity to store.
     * @param array   $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/create-company-address
	 * @see https://api.sellsy.com/doc/v2/#operation/create-contact-address
	 * @see https://api.sellsy.com/doc/v2/#operation/create-individual-address
     */
    public function store(Address $address, array $query = []): Response
    {
        $body = $address->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request("{$this->endpoint}/{$this->relatedEntity->id}/addresses")
                        ->post(array_filter($body) + $query);

        return $this->prepareResponse($response);
    }

    /**
     * Update an existing address.
     *
     * @param Address $address The address entity to store.
     * @param array   $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/update-company-address
	 * @see https://api.sellsy.com/doc/v2/#operation/update-contact-address
	 * @see https://api.sellsy.com/doc/v2/#operation/update-individual-address
     */
    public function update(Address $address, array $query = []): Response
    {
        $body = $address->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request("{$this->endpoint}/{$this->relatedEntity->id}/addresses/{$address->id}")
                        ->put(array_filter($body) + $query);

        return $this->prepareResponse($response);
    }

    /**
     * Delete an existing address.
     *
     * @param int $id The address id to be deleted.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/delete-company-address
     */
    public function destroy(int $id): Response
    {
        $response = $this->connection
                        ->request("{$this->endpoint}/{$this->relatedEntity->id}/addresses/{$id}")
                        ->delete();

        return $this->prepareResponse($response);
    }
}
