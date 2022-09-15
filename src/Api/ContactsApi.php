<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\Contact;
use Bluerock\Sellsy\Collections\ContactCollection;

/**
 * The API client for the `contacts` namespace.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class ContactsApi extends AbstractApi
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->entity     = Contact::class;
        $this->collection = ContactCollection::class;
    }


    /**
     * List all contacts.
     *
     * @param array $query Query parameters.
     *
     * @return \Illuminate\Http\Client\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-contacts
     */
    public function index(array $query = []): self
    {
        $response = $this->connection
                        ->request('contacts')
                        ->get($query);

        $this->response = $response;
        $this->response->throw();

        return $this;
    }


    /**
     * Show a single contact by id.
     *
     * @param string $id     The contact id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/get-contact
     */
    public function show(string $id, array $query = []): self
    {
        $response = $this->connection
                        ->request("contacts/{$id}")
                        ->get($query);

        $this->response = $response;
        $this->response->throw();

        return $this;
    }


    /**
     * Store (create) an contact.
     *
     * @param Contact $contact The contact entity to store.
     * @param array   $query   Query parameters.
     *
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/create-contact
     */
    public function store(Contact $contact, array $query = []): self
    {
        $body = $contact->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request('contacts')
                        ->post(array_filter($body) + $query);
        
        $this->response = $response;
        $this->response->throw();

        return $this;
    }


    /**
     * Update an existing contact.
     *
     * @param Contact $contact The contact entity to store.
     * @param array   $query   Query parameters.
     *
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/update-contact
     */
    public function update(Contact $contact, array $query = []): self
    {
        $body = $contact->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request("contacts/{$contact->id}")
                        ->put(array_filter($body) + $query);
        
        $this->response = $response;
        $this->response->throw();

        return $this;
    }


    /**
     * Delete an existing contact.
     *
     * @param int $id The contact id to be deleted.
     *
     * @return self
     * @see https://api.sellsy.com/doc/v2/#operation/delete-contact
     */
    public function destroy(int $id): self
    {
        $response = $this->connection
                        ->request("contacts/{$id}")
                        ->delete();
        
        $this->response = $response;
        $this->response->throw();

        return $this;
    }
}
