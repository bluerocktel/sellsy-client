<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Collections\SmartTagCollection;
use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Entities\Contracts\HasSmartTags;
use Bluerock\Sellsy\Entities\SmartTag;
use Illuminate\Support\Str;

/**
 * The API client for the smarts tags management in an entity.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.4
 */
class EntitySmartTagsApi extends AbstractApi
{
	/**
	 * @var HasSmartTags The related entity owning the smart tags.
	 */
	protected $relatedEntity;

	/**
	 * @var string The related entity base endpoint.
	 */
	protected $endpoint;

	/**
	 * @param HasSmartTags $relatedEntity   related entity owning the smart tags.
	 * @inheritdoc
	 */
	public function __construct(HasSmartTags $relatedEntity)
	{
		parent::__construct();

		$endpoint = Str::of(get_class($relatedEntity))
			->afterLast('\\')
			->lower()
			->plural();
		// Credit-notes endpoint specific format, due to '-'.
		if ('creditnotes' == $endpoint) {
			$endpoint = 'credit-notes';
		}

		$this->entity     = SmartTag::class;
		$this->collection = SmartTagCollection::class;

		$this->endpoint = (string) $endpoint;
		$this->relatedEntity = $relatedEntity;
	}

	/**
	 * List all smart tags.
	 *
	 * @param array $query Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/get-invoice-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/get-estimate-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/get-opportunity-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/get-credit-note-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/get-company-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/get-contact-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/get-individual-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/get-order-smart-tags
	 */
	public function index(array $query = []): Response
	{
		$response = $this->connection
			->request("{$this->endpoint}/{$this->relatedEntity->id}/smart-tags")
			->get($query);

		return $this->prepareResponse($response);
	}


	/**
	 * Store (add) a smart tag to the entity.
	 *
	 * @param SmartTag $smartTag	The smart tag to assign.
	 * @param array   $query   Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/link-opportunity-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/link-estimate-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/link-invoice-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/link-credit-note-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/link-company-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/link-contact-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/link-individual-smart-tags
	 * @see https://api.sellsy.com/doc/v2/#operation/link-order-smart-tags
	 */
	public function store(SmartTag $smartTag, array $query = []): Response
	{
		$body = $smartTag->toArray();
		$response = $this->connection
			->request($this->appendQuery("{$this->endpoint}/{$this->relatedEntity->id}/smart-tags", $query))
			->post([$body]);

		return $this->prepareResponse($response);
	}

}