<?php

namespace Bluerock\Sellsy\Api\Concerns;

use Bluerock\Sellsy\Api;

/**
 * @package bluerock/sellsy-client
 * @author  Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.4
 * @access public
 */
trait CanManageFavouriteFiltersApi
{
	/**
	 * Give the favourite filters
	 *
	 * @return Api\EntityFavouriteFiltersApi
	 */
	public function favouriteFilters(): Api\EntityFavouriteFiltersApi
	{
		return new Api\EntityFavouriteFiltersApi($this);
	}
}