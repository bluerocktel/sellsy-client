<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Collections\CreditNoteCollection;
use Bluerock\Sellsy\Entities\Company;
use Bluerock\Sellsy\Entities\CreditNote;
use Bluerock\Sellsy\Core\Response;

/**
 * The API client for the `credit-notes` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.2.3
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Invoices
 */
class CreditNotesApi extends AbstractApi implements Contracts\HasFavouriteFiltersApi
{
	use Concerns\CanManageFavouriteFiltersApi;

    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->entity     = CreditNote::class;
        $this->collection = CreditNoteCollection::class;
    }

    /**
     * List all credit-notes.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-credit-note
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request('credit-notes')
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Show a single credit-note by id.
     *
     * @param string $id     The credit-note id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-credit-note
     */
    public function show(string $id, array $query = []): Response
    {
        $response = $this->connection
                        ->request("credit-notes/{$id}")
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Search for credit-notes using filters.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @seehttps://api.sellsy.com/doc/v2/#operation/search-credit-notes
     */
    public function search(array $filters = [], array $query = []): Response
    {
        $response = $this->connection
                        ->request($this->appendQuery('credit-notes/search', $query))
                        ->post(compact('filters'));

        return $this->prepareResponse($response);
    }


	/**
	 * Store (create) a credit note.
	 *
	 * @param CreditNote $creditNote The credit-note entity to store.
	 * @param array   $query   Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/create-credit-note
	 */
	public function store(CreditNote $creditNote, array $query = []): Response
	{
		$body = $creditNote->except('id')
			->except('owner')
			->toArray();

		$response = $this->connection
			->request('credit-notes')
			->post(array_filter($body) + $query);

		return $this->prepareResponse($response);
	}


	/**
	 * Update an existing credit-note.
	 *
	 * @param CreditNote $creditNote The credit-note entity to update.
	 * @param array   $query   Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/update-credit-note
	 */
	public function update(CreditNote $creditNote, array $query = []): Response
	{
		$body = $creditNote->except('id')
			->except('owner')
			->toArray();

		$response = $this->connection
			->request("credit-notes/{$creditNote->id}")
			->put(array_filter($body) + $query);

		return $this->prepareResponse($response);
	}
}
