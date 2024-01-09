<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Entities\Address;
use Bluerock\Sellsy\Entities\Client;
use Bluerock\Sellsy\Entities\Company;
use Bluerock\Sellsy\Entities\Contact;
use Bluerock\Sellsy\Entities\Entity;
use Bluerock\Sellsy\Exceptions\ApiClientErrorException;

/**
 * The API client for the `addresses` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.2.3
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Companies
 */
class GenericAddressesApi extends AbstractApi
{
	/**
	 * @var Client 	entity containing addresses
	 */
	protected $parentEntity;


	/**
	 * @var string entity type (Sellsy api endpoint)
	 */
	protected $sellsyEntityType;


    /**
     * The Api class constructor, setting up common tools.
	 * Package:
	 * bluerock/sellsy-client
	 *
	 * @param Entiyt	The parent entity
     */
    public function __construct(Entity $parentEntity)
    {
        parent::__construct();

		// Only clients witch can hold addresses
		if ($parentEntity instanceof Company) {
			$this->sellsyEntityType = 'companies';
		} elseif ($parentEntity instanceof Contact) {
			$this->sellsyEntityType = 'contacts';
		} elseif ($parentEntity instanceof Individual) {
			$this->sellsyEntityType = 'individuals';
		} else {
			throw new ApiClientErrorException(\sprintf('%s class not implemented. Can\'t have addresses?', \get_class($parentEntity)));
		}
        $this->collection = AddressCollection::class;
		$this->parentEntity = $parentEntity;
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
                        ->request("{$this->sellsyEntityType}/{$this->parentEntity->id}/addresses")
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
                        ->request("{$this->sellsyEntityType}/{$this->parentEntity->id}/addresses/{$id}")
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
                        ->request("{$this->sellsyEntityType}/{$this->parentEntity->id}/addresses")
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
                        ->request("{$this->sellsyEntityType}/{$this->parentEntity->id}/addresses/{$address->id}")
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
                        ->request("{$this->sellsyEntityType}/{$this->parentEntity->id}/addresses/{$id}")
                        ->delete();

        return $this->prepareResponse($response);
    }
}
