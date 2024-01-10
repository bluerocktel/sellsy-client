<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\CustomField;
use Illuminate\Support\Str;
use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Entities\Address;
use Bluerock\Sellsy\Collections\CustomFieldCollection;
use Bluerock\Sellsy\Entities\Contracts\HasAddresses;

/**
 * The API client for the custom fields management.
 * If you are looking for custom fields linked to an Entity,
 * see EntityCustomFieldsApi
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.4
 */
class CustomFieldsApi extends AbstractApi
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();
        $this->entity     = CustomField::class;
        $this->collection = CustomFieldCollection::class;
    }

    /**
     * List all custom fields.
     *
     * @param array $query Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-custom-fields
     */
    public function index(array $query = []): Response
    {
        $response = $this->connection
                        ->request('custom-fields')
                        ->get($query);

        return $this->prepareResponse($response);
    }

    /**
     * Show a single custom field by id.
     *
     * @param string $id     The custom field id to retrieve.
     * @param array  $query  Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://api.sellsy.com/doc/v2/#operation/get-custom-field
	 *
     */
    public function show(string $id, array $query = []): Response
    {
        $response = $this->connection
                        ->request("custom-fields/{$id}")
                        ->get($query);

        return $this->prepareResponse($response);
    }

	/**
	 * Search custom fields with some filters.
	 *
	 * @param array $query    Query parameters.
	 * @param array $filters  Filters to use.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/search-custom-fields
	 */
	public function search(array $query = [], array $filters = []): Response
	{
		$response = $this->connection
			->request($this->appendQuery('custom-fields/search', $query))
			->post(compact('filters'));

		return $this->prepareResponse($response);
	}
}
