<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Collections\ContactCollection;
use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Entities\Contracts\HasContacts;
use Bluerock\Sellsy\Entities\Contact;
use function Bluerock\Sellsy\class_to_endpoint;

/**
 * The API client for the contact management of different entity type.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.4
 */
class EntityContactsApi extends AbstractApi
{
	/**
	 * @var HasContacts The related entity owning the contacts.
	 */
	protected $relatedEntity;

	/**
	 * @var string The related entity base endpoint.
	 */
	protected $endpoint;

	/**
	 * @param HasContacts $relatedEntity   related entity owning the contacts.
	 * @inheritdoc
	 */
	public function __construct(HasContacts $relatedEntity)
	{
		parent::__construct();

		$this->entity     = Contact::class;
		$this->collection = ContactCollection::class;

		$this->endpoint = class_to_endpoint($relatedEntity);
		$this->relatedEntity = $relatedEntity;
	}

	/**
	 * List all contacts.
	 *
	 * @param array $query Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/get-company-contacts
	 * @see https://api.sellsy.com/doc/v2/#operation/get-individual-contacts
	 */
	public function index(array $query = []): Response
	{
		$response = $this->connection
			->request("{$this->endpoint}/{$this->relatedEntity->id}/contacts")
			->get($query);

		return $this->prepareResponse($response);
	}

	/**
	 * Show a single contact by id.
	 * (Duplicate of ConcatsApi::show())
	 *
	 * @param string $id     The contact id to retrieve.
	 * @param array  $query  Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/get-contact
	 */
	public function show(string $id, array $query = []): Response
	{
		$response = $this->connection
			->request("contacts/{$id}")
			->get($query);

		return $this->prepareResponse($response);
	}

	/**
	 * Store (add) a link between a contact and a company.
	 *
	 * @param Contact $contact The contact entity to store.
	 * @param array   $query   Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/link-company-contact
	 * @see https://api.sellsy.com/doc/v2/#operation/link-individual-contact
	 */
	public function store(Contact $contact, array $query = []): Response
	{
		$response = $this->connection
			->request("{$this->endpoint}/{$this->relatedEntity->id}/contacts/{$contact->id}")
			->post($query);

		return $this->prepareResponse($response);
	}

	/**
	 * Update a contact link.
	 *
	 * @param Contact $contact	The contact entity to store.
	 * @param array   $query   Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/update-company-contact
	 */
	public function update(Contact $contact, array $query = []): Response
	{
		$body = $contact->except('id')
			->except('owner')
			->toArray();

		$response = $this->connection
			->request("{$this->endpoint}/{$this->relatedEntity->id}/contacts/{$contact->id}")
			->put(array_filter($body) + $query);

		return $this->prepareResponse($response);
	}

	/**
	 * Remove a contact link.
	 *
	 * @param int $id The contact id to be deleted.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/unlink-company-contact
	 * @see https://api.sellsy.com/doc/v2/#operation/unlink-individual-contact
	 */
	public function destroy(int $id): Response
	{
		$response = $this->connection
			->request("{$this->endpoint}/{$this->relatedEntity->id}/contacts/{$id}")
			->delete();

		return $this->prepareResponse($response);
	}


}