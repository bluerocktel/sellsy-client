<?php

namespace Hydrat\Sellsy\Api;

use Hydrat\Sellsy\Entities\Company;
use Hydrat\Sellsy\Collections\CompanyCollection;

/**
 * The API client for the `companies` namespace.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
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
     * @return \Illuminate\Http\Client\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-companies
     */
    public function index(array $query = []): self
    {
        $response = $this->connection
                        ->request('companies')
                        ->get($query);

        $this->response = $response;
        $this->response->throw();

        return $this;
    }


    /**
     * Show a single company by id.
     *
     * @param string $id     The company id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/get-company
     */
    public function show(string $id, array $query = []): self
    {
        $response = $this->connection
                        ->request("companies/{$id}")
                        ->get($query);

        $this->response = $response;
        $this->response->throw();

        return $this;
    }


    /**
     * Store (create) an company.
     *
     * @param Company $company The company entity to store.
     * @param array   $query   Query parameters.
     *
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/create-company
     */
    public function store(Company $company, array $query = []): self
    {
        $body = $company->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request('companies')
                        ->post(array_filter($body) + $query);
        
        $this->response = $response;
        $this->response->throw();

        return $this;
    }


    /**
     * Update an existing company.
     *
     * @param Company $company The company entity to store.
     * @param array   $query   Query parameters.
     *
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/update-company
     */
    public function update(Company $company, array $query = []): self
    {
        $body = $company->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request("companies/{$company->id}")
                        ->put(array_filter($body) + $query);
        
        $this->response = $response;
        $this->response->throw();

        return $this;
    }


    /**
     * Delete an existing company.
     *
     * @param int $id The company id to be deleted.
     *
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/delete-company
     */
    public function destroy(int $id): self
    {
        $response = $this->connection
                        ->request("companies/{$id}")
                        ->delete();
        
        $this->response = $response;
        $this->response->throw();

        return $this;
    }
}
