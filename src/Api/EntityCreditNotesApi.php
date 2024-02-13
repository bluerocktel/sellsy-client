<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Collections\CreditNoteCollection;
use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Entities\Contracts\HasCreditNotes;
use Bluerock\Sellsy\Entities\CreditNote;
use function Bluerock\Sellsy\class_to_endpoint;

/**
 * The API client for the credit-notes management in an entity.
 * If you are looking for credit-notes declarations in Sellsy,
 * see CreditNotesApi
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.4
 */
class EntityCreditNotesApi extends AbstractApi
{
	/**
	 * @var HasCreditNotes The related entity owning the credit notes.
	 */
	protected $relatedEntity;

	/**
	 * @var string The related entity base endpoint.
	 */
	protected $endpoint;

	/**
	 * @param HasCreditNotes $relatedEntity   related entity owning the custom fields.
	 * @inheritdoc
	 */
	public function __construct(HasCreditNotes $relatedEntity)
	{
		parent::__construct();

		$this->entity     = CreditNote::class;
		$this->collection = CreditNoteCollection::class;

		$this->endpoint = class_to_endpoint($relatedEntity);
		$this->relatedEntity = $relatedEntity;
	}

	/**
	 * List all credit-notes.
	 *
	 * @param array $query Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/get-invoice-credit-notes
	 */
	public function index(array $query = []): Response
	{
		$response = $this->connection
			->request("{$this->endpoint}/{$this->relatedEntity->id}/credit-notes")
			->get($query);

		return $this->prepareResponse($response);
	}

}