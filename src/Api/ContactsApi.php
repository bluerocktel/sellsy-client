<?php

namespace Hydrat\Sellsy\Api;

/**
 * The API client for the `contacts` namespace.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 */
class ContactsApi extends AbstractApi
{
    /**
     * Get all contacts.
     *
     * @param array $options The options as described in the documentation.
     *
     * @return \Illuminate\Http\Client\Response
     */
    public function index(array $options = [])
    {
        return $this->connection
            ->request('contacts')
            ->get($options);
    }


    /**
     * Show a single contact by id.
     *
     * @param string $id The contact id to retrieve.
     *
     * @return \Illuminate\Http\Client\Response
     */
    public function show(string $id)
    {
        return $this->connection
            ->request("contacts/{$id}")
            ->get();
    }


    /**
     * Store (create) an contact.
     *
     * @param array $data The contact data.
     *
     * @return \Illuminate\Http\Client\Response
     */
    public function store(array $data = [])
    {
        return $this->connection
            ->request('contacts')
            ->post($data);
    }


    /**
     * Update an existing contact by id.
     *
     * @param string $id The contact ID to update.
     * @param array $data The contact data.
     *
     * @return \Illuminate\Http\Client\Response
     */
    public function update(string $id, array $data = [])
    {
        return $this->connection
            ->request("contacts/{$id}")
            ->put($data);
    }
}
