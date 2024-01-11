<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Collections\FavouriteFilterCollection;
use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Api\Contracts\HasFavouriteFiltersApi;
use Bluerock\Sellsy\Entities\FavouriteFilter;
use Illuminate\Support\Str;

/**
 * The API client for the favourite filters management of different entity type.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.4
 */
class EntityFavouriteFiltersApi extends AbstractApi
{
	use Concerns\CanManageFavouriteFiltersApi;

	/**
	 * @var string The related entity base endpoint.
	 */
	protected $endpoint;

	/**
	 * @param HasFavouriteFiltersApi $relatedApi   related entity owning the custom fields.
	 * @inheritdoc
	 */
	public function __construct(HasFavouriteFiltersApi $relatedApi)
	{
		parent::__construct();

		$endpoint = Str::of(get_class($relatedApi))
			->afterLast('\\')
			->replaceLast('Api', '')
			->lower()
			->plural();
		$this->endpoint = (string) $endpoint;
echo "{$this->endpoint}/favourite-filters\n";

		$this->entity     = FavouriteFilter::class;
		$this->collection = FavouriteFilterCollection::class;
	}

	/**
	 * List all favourite filters.
	 *
	 * @param array $query Query parameters.
	 *
	 * @return \Bluerock\Sellsy\Core\Response
	 * @see https://api.sellsy.com/doc/v2/#operation/get-company-favourite-filters
	 * @see https://api.sellsy.com/doc/v2/#operation/get-contact-favourite-filters
	 * @see https://api.sellsy.com/doc/v2/#operation/get-individual-favourite-filters
	 * @see https://api.sellsy.com/doc/v2/#operation/get-opportunity-favourite-filters
	 * @see https://api.sellsy.com/doc/v2/#operation/get-estimate-favourite-filters
	 * @see https://api.sellsy.com/doc/v2/#operation/get-invoice-favourite-filters
	 * @see https://api.sellsy.com/doc/v2/#operation/get-order-favourite-filters
	 * @see https://api.sellsy.com/doc/v2/#operation/get-credit-note-favourite-filters
	 */
	public function index(array $query = []): Response
	{
		$response = $this->connection
			->request("{$this->endpoint}/favourite-filters")
			->get($query);

		return $this->prepareResponse($response);
	}

}