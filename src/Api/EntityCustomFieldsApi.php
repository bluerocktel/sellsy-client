<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Collections\CustomFieldCollection;
use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Entities\Contracts\HasCustomFields;
use Bluerock\Sellsy\Entities\CustomField;
use Bluerock\Sellsy\Entities\CustomFieldValue;
use Bluerock\Sellsy\Helpers\ApiEndpointHelper;
use function Bluerock\Sellsy\class_to_endpoint;

/**
 * The API client for the custom fields management in an entity.
 * If you are looking for custom fields declarations in Sellsy,
 * see CustomFieldsApi
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.4
 */
class EntityCustomFieldsApi extends AbstractApi
{
	/**
	 * @var HasCustomFields The related entity owning the custom fields.
	 */
	protected $relatedEntity;

	/**
	 * @var string The related entity base endpoint.
	 */
	protected $endpoint;

	/**
	 * @param HasCustomFields $relatedEntity   related entity owning the custom fields.
	 * @inheritdoc
	 */
	public function __construct(HasCustomFields $relatedEntity)
	{
		parent::__construct();

		$this->entity     = CustomField::class;
		$this->collection = CustomFieldCollection::class;

		$this->endpoint = class_to_endpoint($relatedEntity);
		$this->relatedEntity = $relatedEntity;
	}

	/**
	 * List all custom fields.
	 *
	 * @param array $query Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/get-company-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/get-contact-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/get-individual-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/get-opportunity-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/get-estimate-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/get-invoice-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/get-order-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/get-credit-note-custom-fields
	 */
	public function index(array $query = []): Response
	{
		$response = $this->connection
			->request("{$this->endpoint}/{$this->relatedEntity->id}/custom-fields")
			->get($query);

		return $this->prepareResponse($response);
	}

	/**
	 * Update a custom field value.
	 *
	 * @param CustomFieldValue $customFieldValue    The custom field value to update.
	 * @param array  $query                         Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/update-company-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-contact-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-individual-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-opportunity-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-estimate-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-invoice-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-order-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-credit-note-custom-fields
	 */
	public function update(CustomFieldValue $customFieldValue, array $query = []): Response
	{
		$body = $customFieldValue->toArray();
		$response = $this->connection
			->request($this->appendQuery("{$this->endpoint}/{$this->relatedEntity->id}/custom-fields", $query))
			->put([$body]);

		return $this->prepareResponse($response);
	}

	/**
	 * Update many fields at the same time (also works if you specify only one field)
	 *
	 * @param array[CustomFieldValue] $customFieldsValues   The CustomFieldValues to update
	 * @param array  $query                                 Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/update-company-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-contact-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-individual-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-opportunity-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-estimate-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-invoice-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-order-custom-fields
	 * @see https://api.sellsy.com/doc/v2/#operation/update-credit-note-custom-fields
	 */
	public function updateMany(array $customFieldsValues, array $query = []): Response
	{
		$response = $this->connection
			->request($this->appendQuery("{$this->endpoint}/{$this->relatedEntity->id}/custom-fields", $query))
			->put($customFieldsValues);

		return $this->prepareResponse($response);
	}
}