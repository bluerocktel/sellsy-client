<?php

namespace Bluerock\Sellsy\Api;

use Illuminate\Support\Arr;
use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Entities\StaffMember;
use Bluerock\Sellsy\Collections\StaffMemberCollection;

/**
 * The API client for the `staffs` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.1
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/StaffMembers
 */
class StaffsApi extends AbstractApi
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->entity     = StaffMember::class;
        $this->collection = StaffMemberCollection::class;
    }

    /**
     * List all staff members.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-staffs
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request('staffs')
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Show a single staff member by id.
     *
     * @param string $id     The staff member id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-staff
     */
    public function show(string $id, array $query = []): Response
    {
        $response = $this->connection
                        ->request("staffs/{$id}")
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Store (create) an staff member.
     *
     * @param StaffMember $staff The staff member entity to store.
     * @param array     $query     Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/create-staff
     */
    public function store(StaffMember $staff, array $query = []): Response
    {
        $body = $staff->except('id')
                          ->except('owner')
                          ->toArray();

        $response = $this->connection
                        ->request('staffs')
                        ->post(array_filter($body) + $query);
        
        return $this->prepareResponse($response);
    }

    /**
     * Update an existing staff member.
     *
     * @param StaffMember $staff  The staff member entity to store.
     * @param array       $query  Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/update-staff
     */
    public function update(StaffMember $staff, array $query = []): Response
    {
        $body = $staff->except('id')
                    ->except('owner')
                    ->toArray();

        $response = $this->connection
                        ->request("staffs/{$staff->id}")
                        ->put(array_filter($body) + $query);
        
        return $this->prepareResponse($response);
    }

    /**
     * Delete an existing staff member.
     *
     * @param int $id The staff member id to be deleted.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/delete-staff
     */
    public function destroy(int $id): Response
    {
        $response = $this->connection
                        ->request("staffs/{$id}")
                        ->delete();
        
        return $this->prepareResponse($response);
    }

    /**
     * Search staff members with some filters.
     *
     * @param array $query    Query parameters.
     * @param array $filters  Filters to use.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/search-staffs
     */
    public function search(array $query = [], array $filters = []): Response
    {
        $response = $this->connection
                        ->request('staffs/search' . '?' . Arr::query($query))
                        ->post(
                            compact('filters')
                        );

        return $this->prepareResponse($response);
    }
}
