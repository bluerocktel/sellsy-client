<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\Address;
use Bluerock\Sellsy\Entities\Company;
use Bluerock\Sellsy\Collections\CompanyCollection;
use Bluerock\Sellsy\Core\Response;

/**
 * The API client for the `companies` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.3
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Companies
 */
class CompaniesApi extends AbstractApi
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->entity     = Company::class;
        $this->collection = CompanyCollection::class;
    }

    /**
     * List all companies.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-companies
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request('companies')
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Show a single company by id.
     *
     * @param string $id     The company id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-company
     */
    public function show(string $id, array $query = []): Response
    {
        $response = $this->connection
                        ->request("companies/{$id}")
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Store (create) an company.
     *
     * @param Company $company The company entity to store.
     * @param array   $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/create-company
     */
    public function store(Company $company, array $query = []): Response
    {
        $body = $company->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request('companies')
                        ->post(array_filter($body) + $query);

        return $this->prepareResponse($response);
    }

    /**
     * Update an existing company.
     *
     * @param Company $company The company entity to store.
     * @param array   $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/update-company
     */
    public function update(Company $company, array $query = []): Response
    {
        $body = $company->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request("companies/{$company->id}")
                        ->put(array_filter($body) + $query);

        return $this->prepareResponse($response);
    }

    /**
     * Delete an existing company.
     *
     * @param int $id The company id to be deleted.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/delete-company
     */
    public function destroy(int $id): Response
    {
        $response = $this->connection
                        ->request("companies/{$id}")
                        ->delete();

        return $this->prepareResponse($response);
    }

    /**
     * Search for companies using filters.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/search-companies
     */
    public function search(array $filters = [], array $query = []): Response
    {
        $response = $this->connection
                        ->request($this->appendQuery('companies/search', $query))
                        ->post(compact('filters'));

        return $this->prepareResponse($response);
    }

	/**
	 * List all addresses.
	 *
	 * @param Company $company The company entity to use
	 * @param array $query Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/get-company-addresses
	 */
	public function indexAddress(Company $company, array $query = []): Response
	{
		$response = $this->connection
			->request("companies/{$company->id}/addresses")
			->get($query);

		return $this->prepareResponse($response);
	}

	/**
	 * Show a single address by id.
	 *
	 * @param Company $company    The company entity to use
	 * @param string  $id         The address id to retrieve.
	 * @param array  $query  Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/get-company-address
	 *
	 */
	public function showAddress(Company $company, string $id, array $query = []): Response
	{
		$response = $this->connection
			->request("companies/{$company->id}/addresses/{$id}")
			->get($query);

		return $this->prepareResponse($response);
	}

	/**
	 * Store (create) an address.
	 *
	 * @param Company $company    The company entity to use
	 * @param Address $address    The address entity to store.
	 * @param array   $query   Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/create-company-address
	 */
	public function storeAddress(Company $company, Address $address, array $query = []): Response
	{
		$body = $address->except('id')
			->except('owner')
			->toArray();

		$response = $this->connection
			->request("companies/{$company->id}/addresses")
			->post(array_filter($body) + $query);

		return $this->prepareResponse($response);
	}

	/**
	 * Update an existing address.
	 *
	 * @param Company $company    The company entity to use
	 * @param Address $address    The address entity to store.
	 * @param array   $query   Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/update-company-address
	 */
	public function updateAddress(Company $company, Address $address, array $query = []): Response
	{
		$body = $address->except('id')
			->except('owner')
			->toArray();

		$response = $this->connection
			->request("companies/{$company->id}/addresses/{$address->id}")
			->put(array_filter($body) + $query);

		return $this->prepareResponse($response);
	}

	/**
	 * Delete an existing address.
	 *
	 * @param Company $company    The company entity to use
	 * @param int     $id         The address id to be deleted.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/delete-company-address
	 */
	public function destroyAddress(Company $company, int $id): Response
	{
		$response = $this->connection
			->request("companies/{$company->id}/addresses/{$id}")
			->delete();

		return $this->prepareResponse($response);
	}
}
